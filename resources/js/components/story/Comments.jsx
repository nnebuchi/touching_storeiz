import Related from "./Related";
import { Fragment } from "react";
import parse from 'html-react-parser';

export default function Comments({story, related, user, toggleCommentControl, showEditComment, flagCommentForDeletion, hideEditComment, updateComment, setEditComment}){

    return(
        <div className="col-lg-9  mx-lg-auto mx-xl-0 offset-lg-1 col-md-8 offset-md-2 col-12 col-xl-4 reaction_card px-4 px-lg-0 px-xl-4 mt-lg-0 mt-3 mt-md-5 mt-lg-5">
                        
            {story?.comments?.length > 0 &&
                <div>
                    <div className="titles d-flex justify-content-between">
                        <h3 className="reaction">Reactions</h3>
                        <h5 className="ms-auto more">See more</h5>
                    </div>
                    <div id="comment-holder" style={{maxHeight:"500px", overflowY:"scroll", borderBottom:"2px solid #c5844d"}}>
                        
                        {story?.comments?.map((comment, commentIndex)=>(
                            <Fragment key={comment.id}>
                                {comment.show_control === true && 
                                    <div className="border rounded py-3 text-end comment-action-box">
                                        
                                        <div className="comment-action py-2 px-2"> 
                                            <span className="edit-comment" onClick={()=>showEditComment(commentIndex)} style={{color:"red!important"}}> 
                                                Edit <i className="fa fa-edit" ></i>
                                            </span>
                                                &nbsp; &nbsp;&nbsp;
                                            <span className="delete-comment" onClick={()=>flagCommentForDeletion(commentIndex)}>Remove <i className="fa fa-trash"></i></span>
                                        </div>
                                    </div>
                                }
                                
                                {comment.show_edit === false ?
                                <div className="custom_card border border-1 rounded-2 px-3 py-2 my-4 comment-item">
                                    <div className="d-flex justify-content-between">
                                        
                                        <div className="card-title">
                                            {comment?.user?.username}
                                            
                                            {story.user_id == comment.user_id &&
                                                <small style={{fontSize: "10px"}}>Author</small>
                                            }
                                            
                                            
                                        </div>
                                        
                                        <small className="text-mut">
                                            {comment?.created_at} 
                                            { user &&
                                            <>
                                                &nbsp; &nbsp;&nbsp; 
                                                <span className="comment-action-toggle ms-3 three-dot" onClick={()=>toggleCommentControl(commentIndex)} style={{fontWeight:"normal"}} ><i className="fa fa-ellipsis-v comment-action-toggle"></i></span>
                                            </>
                                                
                                            }
                                            
                                        </small>
                                        
                                    </div>
                                    <div className="custom-card_text comment-text mt-2">{
                                        typeof(comment.content) === 'string' && parse(comment.content)
                                    } </div>
                                </div>
                                
                                :
                                    <div className="w-100 comment-edit-input">
                                        <textarea name="" className="w-100" defaultValue={comment.content} onChange={(event)=>setEditComment(event, commentIndex)}></textarea>
                                        <div>
                                            <button className="btn ts-btn-primary-outline btn-sm cancel-edit-comment" onClick={()=>hideEditComment(commentIndex)}>Cancel</button>
                                            
                                            &nbsp;

                                            <button className="btn ts-btn-primary btn-sm text-white update-comment-btn" onClick={()=>updateComment(commentIndex)} style={{backgroundColor:"#FF8219"}}>Update</button>
                                        </div>
                                    </div>
                                }
                                
                            </Fragment>
                                
                        ))}
                        
                    </div>
                    
                </div>


            }
            <Related related={related} />
            
        </div>
    );
}