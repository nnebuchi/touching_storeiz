export default function CommentModal({validateComment, currentComment, setCurrentComment}){
    return (
        <div className="modal fade" id="commentModal" tabIndex="-1" aria-labelledby="commentModalLabel" aria-hidden="true" >
            <div className="modal-dialog modal-dialog-scrollable">
            <div className="modal-content modal-content-cust">
                <div className="modal-head d-flex">
                <h1 className="modal-titl  modal-center mx-auto my-3" id="commentModalLabel">Comment</h1>
                <span type="button" className="btn-close close-x my-3" data-bs-dismiss="modal" aria-label="Close"></span>
                </div>
                <div className="modal-bod" >
                <textarea name="" id="comment" className="w-100 p-2 mt-3" rows="5" placeholder="Start typing" value={currentComment} onInput={(event)=>setCurrentComment(event.target.value)}></textarea>
                </div>
                <div className="modal-foote text-center">
                <button type="button" className="cust_btn-1 w-75 mx-auto my-4 comment-btn" onClick={validateComment}>Comment</button>
                </div>
            </div>
            </div>
        </div>
    );
}