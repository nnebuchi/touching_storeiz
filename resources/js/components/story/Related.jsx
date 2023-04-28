export default function Related({related}){
    return(
        <div className="mt-5">
            <h3 className="text-capitalize reaction">similiar stories</h3>
            <div style={{maxHeight:"600px", overflowY:"scroll", borderBottom:"2px solid #c5844d"}}>
                
                {related?.map((similar)=>(
                    <div className="card similiar_card mb-3" key={similar?.id} >
                        <div className="row g-0">
                            <div className="col-4">
                            {similar?.cover_photo?.length > 0 ?
                                <img src={`${url}/storage/${similar.cover_photo[0].file}`} className="rounded-start similiar_card-img" alt="..." />
                                // {`${url}/storage/${story.cover_photo[0].file}`}
                                :
                                <img src={`${url}/public/assets/img/logo/logo_alt.png`} className="rounded-start similiar_card-img " alt="..." />
                            }
                            </div>
                            <div className="col-8">
                                <div className="card-body">
                                <h5 className="card-title similar-story-title">
                                    <a href={`${url}/story/${similar?.slug}`}>{similar?.title}</a>
                                </h5>
                                <p className="card-text">{similar?.author?.pen_name} </p> 
                                </div>
                            </div>
                        </div>
                    </div>
                    ))}
            </div>
            
        </div>
    );
}