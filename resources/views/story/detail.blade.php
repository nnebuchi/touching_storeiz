@extends('layouts.main.app')
@section('content')
<div class="container">
    <div id="alert-holder" class="alert-holder"></div>
    <section class="read_section" >
        <div class="read_hero">
            <div class="cust_container-read">
                <div class="owl-carousel owl-theme ad-banner-carousel">
                     
                    <div class="item">
                       <div>
                           <img src="{{asset('assets/img/readstory/coca-cola.png')}}" class="img-fluid rounded-start readCust_card-img"  alt="..." style="max-height: 250px;">
                       </div>
                             
                    </div>
                    <div class="item">
                        <div>
                            <img src="{{asset('assets/img/readstory/coca-cola.png')}}" class="img-fluid rounded-start readCust_card-img"  alt="..." style="max-height: 250px;">
                        </div>
                    </div>
                    <div class="item">
                        <div>
                            <img src="{{asset('assets/img/readstory/coca-cola.png')}}" class="img-fluid rounded-start readCust_card-img"  alt="..." style="max-height: 250px;">
                        </div>
                    </div>
                </div>
            </div>
            </div>

    </section>
    <div id="react-root" data-react="Detail"></div>

</div>

<script>
    $(document).ready(function() {
        $('.ad-banner-carousel').owlCarousel({
            loop: true,
            margin: 20,
            responsiveClass: true,
            responsive: {
                0: {
                    items: 1,
                    loop: true,
                }
            
            }
        })

        const social_share = [
            {
                title:"facebook",
                color:"#4267B2",
                icon:"fa-facebook",
                url:"https://web.facebook.com/sharer/sharer.php?u="+window.location.href 
            },
            {
                title:"whatsapp",
                color:"#25D366",
                icon:"fa-whatsapp",
                url:"whatsapp://send?text="+window.location.href 
            },
            {
                title:"twitter",
                color:"#1DA1F2",
                icon:"fa-twitter",
                url:"https://twitter.com/share?url="+window.location.href 
            },
            {
                title:"linkedin",
                color:"#0072b1",
                icon:"fa-linkedin",
                url:"https://www.linkedin.com/shareArticle?mini=true&url="+window.location.href 
            },

        ]

        social_share.forEach(social=>{
            $(".share-list").append(`
            <li>
                <a href="${social.url}" target="_blank">
                <span style="background-color:${social.color};"></span>
                <span style="background-color:${social.color};"></span>
                <span style="background-color:${social.color};"></span>
                <span style="background-color:${social.color};"></span>
                <span class="fa ${social.icon}" style="background-color:${social.color};><i class="fa ${social.icon}"></i></span>
                </a> 
            </li>
            `);
        });
    }); 


</script>



@endsection