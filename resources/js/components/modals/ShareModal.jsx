export default function ShareModal({copyShareLink}){
    return (
        <div className="modal fade" id="shareModal" tabIndex="-1" aria-labelledby="shareModalLabel" aria-hidden="true" >
            <div className="modal-dialog modal-dialog-scrollable"  >
            <div className="modal-content modal-content-cust "  >
                <div className="modal-head d-flex">
                <h1 className="modal-titl  modal-center mx-auto my-3" id="shareModalLabel">Share</h1>
                <span type="button" className="btn-close close-x my-3" data-bs-dismiss="modal" aria-label="Close"></span>
                </div>
                <div className="modal-bod" >
                <div className="share-holder ts-border-2x pe-3 rounded">
                    <ul className="share-list d-flex flex-wrap justify-content-center"> 
                        
                    </ul>  
                </div>
                </div>
                <div className="modal-foote text-center">
                
                <button type="button" className="cust_btn-1 w-75 mx-auto my-4 share-btn" onClick={copyShareLink}> <i className="fa fa-copy"></i> Copy Link</button>
                </div>
            </div>
            </div>
        </div>
    );
}