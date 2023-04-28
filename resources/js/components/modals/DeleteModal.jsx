export default function DeleteModal({deleteComment}){
    return(
        <div className="modal fade" id="deleteCommentModal" tabIndex="-1" aria-labelledby="deleteCommentModalLabel" aria-hidden="true" >
            <div className="modal-dialog modal-dialog-scrollable"  >
                <div className="modal-content modal-content-cust "  >
                    <div className="modal-head d-flex">
                    <h1 className="modal-titl  modal-center mx-auto my-3" id="deleteCommentModalLabel">Delete Comment?</h1>
                    <span type="button" className="btn-close close-x my-3" data-bs-dismiss="modal" aria-label="Close"></span>
                    </div>
                    <div className="modal-bod" >
                        Are you sure you want to delete this comment ?
                        <div className="modal-foote text-center">
                            <button type="button" className="cust-btn-outline px-4" data-bs-dismiss="modal">No</button>
                            &nbsp;&nbsp;
                            <button id="delete-comment-btn" type="button" className="cust_btn-1 ts-btn-primary mx-auto my-4 comment-btn" target-id="" onClick={deleteComment}>Delete</button>
                        </div>
                    </div>
                </div>
            </div>
        </div>
    );
}