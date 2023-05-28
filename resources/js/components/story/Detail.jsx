import React, {Fragment, useEffect, useState} from 'react';
import parse from 'html-react-parser';
import Comments from './comments';
import ShareModal from '../modals/ShareModal';
import CommentModal from '../modals/CommentModal';
import DeleteModal from '../modals/DeleteModal';
import LoginModal from '../modals/LoginModal';
import RegisterModal from '../modals/RegisterModal';

export default function Detail(){

    const [story, setStory] = useState({});
    const [user, setUser] = useState(null);
    const [storyReadTime, setStoryReadTime] = useState();
    const [related, setRelated] = useState([]);
    const [currentComment, setCurrentComment] = useState();
    const [flaggedComment, setFlaggedComment] = useState("");
    const [spinners, setSpinners] = useState({
        like_btn:false,
        dislike_btn:false
    });

    const path = window.location.href;
    const slug = path.split('/').pop();

    
    const validateComment = () => {
                
        const submitBtn = document.querySelector(".comment-btn");
        const oldBtnHTML = submitBtn.innerHTML;
        setBtnLoading(submitBtn);

        const validation = runValidation([
            {
                id:"comment",
                rules: {'required':true}
            }
            
        ]);

        if(validation === true){
            submitComment(submitBtn, oldBtnHTML);
            
        }else{
            setBtnNotLoading(submitBtn, oldBtnHTML)
        }
    }

    const handleLike = (param, type) => {
        if(!user){
            $('#loginModal').modal('show');
        }else{
            // toogleSpinner(param);
            updateLike(type);
        }
    }

    const flagCommentForDeletion = (commentIndex) => {
        setFlaggedComment(commentIndex)
        $('#deleteCommentModal').modal('show');
    }

    const deleteComment = async () =>{
        return await fetch(`${url}/story/delete-comment`, {
            method:"POST",
            headers: {
                "Content-Type": "application/json",
            },
            body: JSON.stringify({
                id: story?.comments[flaggedComment].id,
                _token: universal_token
            })

        })
        .then((response)=>{
           return response.json()
        })
        .then((feedback)=>{
            if(feedback?.status === 'success'){
                let updatedStory = {...story};
                updatedStory.comments.splice(flaggedComment, 1);
                setStory(updatedStory);
                setFlaggedComment("")
                $('#deleteCommentModal').modal('hide');
            }
        })
        .catch(err => alert(err))

    }

    const toggleCommentControl = (commentIndex) => {
        const updatedStory = {...story};
        updatedStory.comments[commentIndex].show_control = !updatedStory?.comments[commentIndex].show_control;
        setStory(updatedStory);
    }

    const showEditComment = (commentIndex) => {
        const updatedStory = {...story};
        updatedStory.comments[commentIndex].show_edit = true
        setStory(updatedStory);
    }

     const hideEditComment = (commentIndex) => {
        const updatedStory = {...story};
        updatedStory.comments[commentIndex].show_edit = false
        setStory(updatedStory);
        toggleCommentControl(commentIndex);
    }

    
    const toogleSpinner = (param) => {
      
        const spinning = {
            ...spinners
        }
        spinning[param] = !spinners[param]
        
        setSpinners(spinning);
    }

    const sumProp = (array, prop) => {
        return array.reduce((accumulator, object) => {
            return accumulator + object[prop];
          }, 0)
    }

    const updateLike = async (type) => {

        return await fetch(`${url}/story/${slug}/like`, {
            method:"POST",
            headers: {
                "Content-Type": "application/json",
            },
            body: JSON.stringify({
                _token:universal_token,
                user_id: user.id,
                story_id: story.id,
                like_type:type
            })

        })
        .then((response)=>{
           return response.json()
        })
        .then((feedback)=>{
            if(feedback?.status === 'success'){
                let updatedStory = {
                    ...story, 
                    current_user_like: feedback.user_like ? feedback.user_like: null
                };
                // story.current_user_like = feedback.user_like ? feedback.user_like: null
                setStory(updatedStory);
                // toogleSpinner(type=='positive' ? 'like_btn' : 'dislike_btn');
            }
        })
    }

    const updateComment = async (commentIndex) => {

        return await fetch(`${url}/story/update-comment`, {
            method:"POST",
            headers: {
                "Content-Type": "application/json",
            },
            body: JSON.stringify({
                id: story?.comments[commentIndex].id,
                content: story?.comments[commentIndex].edited_content,
                _token: universal_token
            })

        })
        .then((response)=>{
           return response.json();
        })
        .then((feedback)=>{
            if(feedback?.status === 'success'){
                let updatedStory = {...story };
                updatedStory.comments[commentIndex].content = story?.comments[commentIndex].edited_content;
                updatedStory.comments[commentIndex].edited_content = "";
                updatedStory.comments[commentIndex].show_control = false;
                updatedStory.comments[commentIndex].show_edit = false;
                setStory(updatedStory);
            }
        })
        .catch(err=>alert(err))
        
    }

    const setEditComment = (event, commentIndex) => {
        const updatedStory = {...story};
        updatedStory.comments[commentIndex].edited_content = event.target.value;
        setStory(updatedStory);
    }

    const getData = async () => {
        return await fetch(`${url}/story/${slug}/detail`, {
            method: "GET"
          })
          .then(response=>{return response.json()})
          .then(data=>data)
    }

    const submitComment = async (submitBtn, oldBtnHTML) => {
        return await fetch(`${url}/story/${slug}/add-comment`, {
            method: "POST",
            headers: {
                "Content-Type": "application/json",
            },
            body: JSON.stringify({
                content: currentComment,
                story_id: story?.id,
                _token: universal_token
            })
        })
        .then(response=>{
            return response.json()
        })
        .then(feedback=>{
            setBtnNotLoading(submitBtn, oldBtnHTML);
            const updatedStory = {...story};
            feedback.comment.show_edit = false;
            updatedStory.comments.unshift(feedback.comment);
            setStory(updatedStory);
            setCurrentComment("");
            $('.close-x ').click();
        })
        .catch(err=>{
            alert(err)
        })
        
     }

    const copyShareLink = () => {
        navigator.clipboard.writeText(window.location.href);
        alert("Story Link Copied");
    }

    const updateReadRecord = () => {
        return fetch(`${url}/story/${slug}/update-read-record`, {
            method:"POST",
            headers: {
                "Content-Type": "application/json",
            },
            body: JSON.stringify({
                browser_cookie: usercookie.token,
                _token: universal_token
            })
        })
        .then(response=>response.json())
        .then(response=>console.log(response))
        .catch(err=>alert(err));
        
    }


    useEffect( async ()=>{
        const data = await getData();
        data?.data?.story?.comments?.forEach(comment=>{
            comment.show_control = false;
            comment.show_edit = false;
            comment.edited_content = ""
        })
        setStory(data.data.story);
        setUser(data?.data?.user);
        setStoryReadTime(formatReadTimeCount(sumProp(data?.data?.story?.reads, 'time_spent')));
        setRelated(data?.data?.related);

        if(!user || user?.id !== story?.user_id){
            setTimeout(() => {
                fetch(`${url}/story/${slug}/record/read`, {
                    method:"POST",
                    headers: {
                        "Content-Type": "application/json",
                    },
                    body: JSON.stringify({
                        browser_cookie: usercookie.token,
                        _token: universal_token
                    })
                })
                .then(response=>response.json())
                .then(response=>console.log(response))
                .catch(err=>alert(err))
                
            }, 10000);
    
            let recordInterval= setInterval(updateReadRecord, 60000);
            
            document.addEventListener("visibilitychange", () => {
                if(document.hidden){
                    clearInterval(recordInterval);
                }else{
                    recordInterval = setInterval(updateReadRecord, 60000);
                }
            });
        }
      
    }, []);


    return(
        <>
           <section className="story_detials">
                <div className="row" >
                    <div className="col-12 px-4 col-md-10 offset-md-1 px-md-2 col-lg-10  col-xl-8 offset-xl-0 " style={{borderRight:"2px solid #EBD6C3"}} >
                        
                        <div className="row">
                            <div className="cover_img">
                                
                                {story?.cover_photo?.length > 0 &&

                                    <img src={`${url}/storage/${story.cover_photo[0].file}`} alt="Cover photo" className="horror py-4 story-card-img" />
                                }
                                
                                
                            </div>
                            <div className="col-8">
                                <h1 className="story_title">
                                    {story?.title}
                                </h1>
                                <h5 className="my-lg-4 my-2 author"><span className="text-muted">Author:</span> {story?.author?.pen_name}</h5>
                            </div>
                            <div className="col-3 offset-1 ">
                        
                               {
                                !user ?
                                <>
                                    <div className=" icons reaction  not-liked" id="like" onClick={handleLike}>
                                        {spinners.like_btn === true ?
                                            <i className="fa fa-spin fa-spinner"></i>
                                            :
                                            <img src={`${url}/public/assets/img/readstory/thumbs-up.png`} alt="" className="thumbs" />
                                        }
                                        
                                    </div>
                                    <div className="icons ms-lg-5 ms-2 ms-md-4 ms-lg-3 reaction not-disliked" id="dislike" onClick={handleLike}>
                                        <img src={`${url}/public/assets/img/readstory/thumbs-down.png`} alt="" className="thumbs" />
                                    </div>
                                </>
                                    
                               :
                                    story?.current_user_like == null ?
                                    
                                    <>
                                        <div className="icons reaction  not-liked" id="like">
                                            {spinners.like_btn === true ?
                                                 <i className="fa fa-spin fa-spinner"></i>
                                            :
                                                <img src={`${url}/public/assets/img/readstory/thumbs-up.png`} alt="" className="thumbs" onClick={()=>handleLike('like_btn', 'positive')}/>
                                            }
                                        </div>
                                        <div className="icons ms-lg-5 ms-2 ms-md-4 ms-lg-3 reaction not-disliked" id="dislike">
                                            {spinners.dislike_btn === true ?
                                                    <i className="fa fa-spin fa-spinner"></i>
                                                :
                                                    <img src={`${url}/public/assets/img/readstory/thumbs-down.png`} alt="" className="thumbs" onClick={()=>handleLike('dislike_btn', 'negative')} />
                                            }
                                        </div>
                                    </>
                                    :
                                    
                                        story?.current_user_like?.like_type === 'positive' ?
                                        <>
                                            <div className="icons reaction liked" id="like">
                                                {spinners.like_btn === true ?
                                                    <i className="fa fa-spin fa-spinner"></i>
                                                :
                                                    <img src={`${url}/public/assets/img/readstory/thumbs-up-filled.png`} alt="" className="thumbs" onClick={()=>handleLike('like_btn', 'positive')} />
                                                }

                                            </div>
                                            <div className="icons ms-lg-5 ms-2 ms-md-4 ms-lg-3 reaction not-disliked" id="dislike" style={{pointerEvents:"none"}}>
                                                {spinners.dislike_btn === true ?
                                                        <i className="fa fa-spin fa-spinner"></i>
                                                    :
                                                    <img src={`${url}/public/assets/img/readstory/thumbs-down.png`} alt="" className="thumbs" onClick={()=>handleLike('dislike_btn', 'negative')} />
                                                }
                                            </div>
                                        </>
                                        
                                        :
                                      
                                        
                                        <>
                                            <div className=" icons reaction not-liked" id="like" onClick={handleLike}  style={{pointerEvents:"none"}}>
                                                <img src={`${url}/public/assets/img/readstory/thumbs-up.png`} alt="" className="thumbs" onClick={()=>handleLike('like_btn', 'positive')}  />
                                            </div>
                                            <div className="icons ms-lg-5 ms-2 ms-md-4 ms-lg-3 reaction disliked" id="dislike">
                                                <img src={`${url}/public/assets/img/readstory/thumbs-down-filled.png`} alt="" className="thumbs" onClick={()=>handleLike('dislike_btn', 'negative')} />
                                            </div>
                                        </>
                                    }
                            </div>
                                
                        </div>

                        { story?.blurb != null &&
                            <div className="row mt-2 mt-lg-4">
                                <div className="col-12 col-lg-10 col-xl-11">
                                    <div className="row quote-row" >
                                        <div className="col-2 col-lg-2  align-self-start">
                                            <img src={`${url}/public/assets/img/readstory/double-quotes (2).png`} alt="" className="quote" />
                                        </div>
                                        <div className="col-8 col-lg-8  align-self-center quote_text">
                                            {story?.blurb}
                                            

                                        </div>
                                        <div className="col-2 col-lg-2 align-self-end">
                                            <img src={`${url}/public/assets/img/readstory/double-quotes (1).png`} alt="" className="quote" />

                                        </div>
                                    </div>
                                </div>
                            </div>
                        }

                        <div className="row story_stats-section" style={{borderBottom:"2px solid #EBD6C3", paddingBottom: "40px"}}>
                            <div className=" col-12 col-md-6 story_stats">
                                <small className=""><i className="bi bi-book fs-6"></i> {(story?.reads?.length)} Reads</small> 
                                
                                <small><i className="bi bi-clock fs-6 ms-3"></i> {storyReadTime} </small>
                                <small className="ms-3"><i className="bi bi-chat-left fs-6"></i> <span className="comment-count">{story?.comments?.length}</span> comments</small>
                            </div>
                            
                            <div className="col-lg-6 col-12 col-md-6  mt-lg-0 mt-3 ms-0 mt-md-0 " >
                                <button type="button" className="cust-btn-outline  px-4" id="share-icon" data-bs-toggle="modal" data-bs-target="#shareModal"> <i className="bi bi-share"></i> Share</button>
                                <button type="button" className="cust_btn-1 ms-lg-4 ms-5 px-4 px-md-2 px-lg-4 ms-md-2"  data-bs-toggle="modal"  data-bs-target={user==null ?"#loginModal" :"#commentModal" }  >
                                <i className="fa fa-comment"></i> Comment
                                </button>
                            </div>
                            
                        </div>

                        <div className="row mt-2">
                            <div className="col-lg-11 col-12" >
                                <div className="row">
                                    <div className="col-12 col-md-11 col-lg-12 full_story" style={{fontFamily:"Oswald-Regular!important"}}>
                                        {
                                        typeof(story.content) === 'string' &&
                                            parse(story?.content)
                                        }
                                    </div>
                                </div>
                            </div>
                        </div>
                    </div>
                    <Comments story={story} related={related} user={user} toggleCommentControl={toggleCommentControl} showEditComment={showEditComment} flagCommentForDeletion={flagCommentForDeletion} hideEditComment={hideEditComment} updateComment={updateComment} setEditComment={setEditComment} />
                </div>
                
            </section>


            <ShareModal copyShareLink={copyShareLink} />
            {user ?

                <>
                   <CommentModal validateComment={validateComment}  currentComment={currentComment} setCurrentComment={setCurrentComment} />
                    
                    <DeleteModal deleteComment={deleteComment} />
                    
                </>

                :
                <>
                    <LoginModal user={user} />
                    <RegisterModal />
                </>
                

                
            }
            
        </>
        
    )
}
