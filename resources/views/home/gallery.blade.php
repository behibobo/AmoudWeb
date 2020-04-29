
@extends('layouts.main')
@section('content')

    <section class="h-layout__outer">
        <div class="container">
            <div class="h-layout__inner h-layout__inner--abstract">
                <div class="row">
                    <div class="col-md-12">
                        <div class="m-abstract" data-t-name="Abstract">
                            <div class="row">
                                <div class="m-abstract__content col-sm-12 col-md-8">
                                    <div class="a-richtext a-richtext--abstract">
                                        <p>
                                            شرکت عمود سیر همراه با کادری مجرب و متخصص، با بهره گیری از دانش روز دنیا مطابق با استانداردهای جهانی و بهره مندی از مهندسین مکانیک و برق در زمینه طراحی و مونتاژ انواع آسانسور و پله برقی فعالیت خود را آغاز نموده است.

                                            این شرکت همراه با اکیپ فنی و متخصص، با بکارگیری قطعات و لوازم کاملا استاندارد و مرغوب، با ارائه طراحی تخصصی نقشه و محاسبات، اجرای دقیق و منظم پروژه و با بهره گیری از تجارب خود و دانش فنی، آسانسورهایی با کیفیت و ایمنی بالا، بهترین نرمی حرکت، با سرویس دهی عالی و پشتیبانی و تامین قطعات، ارائه داده و آماده هرگونه همکاری طبق سلیقه و نظر آن شرکت محترم  می باشد.
                                            <br>
                                        </p>
                                    </div>
                                </div>

                            </div>
                        </div>
                    </div>
                </div>
            </div>
        </div>
    </section>

    <div class="o-contact-assistant" data-t-name="ContactAssistant">
        <div
            class="o-contact-assistant__popper js-o-contact-assistant__popper o-contact-assistant__popper--state-hidden">
            <div class="o-contact-assistant__popper-wrapper js-o-contact-assistant__popper-wrapper">

                <div
                    class="o-contact-assistant__popper-header js-o-contact-assistant__popper-header o-contact-assistant__popper-header--state-hidden">
                    <button
                        class="o-contact-assistant__go-back-button js-o-contact-assistant__go-back-button o-contact-assistant__go-back-button--state-hidden"
                        role="button">
                        برگشت</button>
                </div>

                <div class="m-contact-assistant-content-richtext" data-t-name="ContactAssistantContentRichtext">
                    <h3 class="m-contact-assistant-content-richtext__title"><b>ارتباط با ما</b></h3>
                    <div
                        class="m-contact-assistant-content-richtext__text js-m-contact-assistant-content-richtext__text">
                        <div class="a-richtext js-m-contact-assistant-content-richtext__inject">
                            <p>شرکت فنی و مهندسی عمودسیر تبریز</p>
                            <p>ارتباط با واحد فروش:<br>
                                <a href="tel:+984133325048">04133325048</a></p>
                            <p>ارتباط با واحد پشتیبانی و خدمات:</br>
                                <a href="tel:+984133326520">04133326520</a></p>
                        </div>
                    </div>
                </div>
                <div class="m-contact-assistant-content-dropdown">

                </div>
            </div>
        </div>
        <div class="o-contact-assistant__badge js-o-contact-assistant__badge"></div>
    </div>
    <div class="iparys_inherited"></div>
    <div id="a-content" class="h-layout__outer--content-standard">
        
        <section class="h-layout__outer">
            <div class="h-layout__inner">
                <div class="container">
                    <div class="row">
                    @foreach($images as $image)
                    
                        <div class="col-md-4">
                            <div class="product_box">

                            <div class="product__image">
                                <img src="{{ asset('uploads/galleries/'.$image->filename)}}" alt="">
                            </div>                            
                        </div>
                        </div>
                        
                    @endforeach    
</div>
</div>
</div>


        </section>
        
       
    </div>
    <div class="iparys_inherited"></div>

    <!-- Root element of PhotoSwipe. Must have class pswp. -->
    <div class="pswp" data-t-name="Lightbox" tabindex=" -1" role="dialog" aria-hidden="true">

        <!-- Background of PhotoSwipe.
     It's a separate element, as animating opacity is faster than rgba(). -->
        <div class="pswp__bg"></div>

        <!-- Slides wrapper with overflow:hidden. -->
        <div class="pswp__scroll-wrap">

            <!-- Container that holds slides. PhotoSwipe keeps only 3 slides in DOM to save memory. -->
            <!-- don't modify these 3 pswp__item elements, data is added later on. -->
            <div class="pswp__container">
                <div class="pswp__item"></div>
                <div class="pswp__item"></div>
                <div class="pswp__item"></div>
            </div>

            <!-- Default (PhotoSwipeUI_Default) interface on top of sliding area. Can be changed. -->
            <div class="pswp__ui pswp__ui--hidden">

                <div class="pswp__top-bar">

                    <!--  Controls are self-explanatory. Order can be changed. -->

                    <div class="pswp__counter"></div>

                    <button class="pswp__button pswp__button--close" title=''></button>

                    <button class="pswp__button pswp__button--fs" title=''></button>

                    <button class="pswp__button pswp__button--zoom" title=''></button>

                    <!-- Preloader demo https://codepen.io/dimsemenov/pen/yyBWoR -->
                    <!-- element will get class pswp__preloader--active when preloader is running -->
                    <div class="pswp__preloader">
                        <div class="pswp__preloader__icn">
                            <div class="pswp__preloader__cut">
                                <div class="pswp__preloader__donut"></div>
                            </div>
                        </div>
                    </div>
                </div>

                <div class="pswp__share-modal pswp__share-modal--hidden pswp__single-tap">
                    <div class="pswp__share-tooltip"></div>
                </div>

                <button class="pswp__button pswp__button--arrow--left" title=''>
                </button>

                <button class="pswp__button pswp__button--arrow--right" title=''>
                </button>

                <div class="pswp__caption">
                    <div class="pswp__caption__center"></div>
                </div>
            </div>
        </div>
    </div>


    <div class="m-lightbox-single-image" data-t-name="LightboxSingleImage" tabindex="-1" role="dialog"
        aria-hidden="true">
        <!-- Root element of PhotoSwipe. Must have class pswp. -->
        <div class="pswp">

            <!-- Background of PhotoSwipe.
       It's a separate element, as animating opacity is faster than rgba(). -->
            <div class="pswp__bg"></div>

            <!-- Slides wrapper with overflow:hidden. -->
            <div class="pswp__scroll-wrap">

                <!-- Container that holds slides. PhotoSwipe keeps only 3 slides in DOM to save memory. -->
                <!-- don't modify these 3 pswp__item elements, data is added later on. -->
                <div class="pswp__container">
                    <div class="pswp__item"></div>
                    <div class="pswp__item"></div>
                    <div class="pswp__item"></div>
                </div>

                <!-- Default (PhotoSwipeUI_Default) interface on top of sliding area. Can be changed. -->
                <div class="pswp__ui pswp__ui--hidden">

                    <div class="pswp__top-bar">

                        <!--  Controls are self-explanatory. Order can be changed. -->

                        <div class="pswp__counter"></div>

                        <button class="pswp__button pswp__button--close" title=''></button>

                        <button class="pswp__button pswp__button--fs" title=''></button>

                        <button class="pswp__button pswp__button--zoom" title=''></button>

                        <!-- Preloader demo https://codepen.io/dimsemenov/pen/yyBWoR -->
                        <!-- element will get class pswp__preloader--active when preloader is running -->
                        <div class="pswp__preloader">
                            <div class="pswp__preloader__icn">
                                <div class="pswp__preloader__cut">
                                    <div class="pswp__preloader__donut"></div>
                                </div>
                            </div>
                        </div>
                    </div>

                    <div class="pswp__share-modal pswp__share-modal--hidden pswp__single-tap">
                        <div class="pswp__share-tooltip"></div>
                    </div>

                    <button class="pswp__button pswp__button--arrow--left" title=''>
                    </button>

                    <button class="pswp__button pswp__button--arrow--right" title=''>
                    </button>

                    <div class="pswp__caption">
                        <div class="pswp__caption__center"></div>
                    </div>
                </div>
            </div>
        </div>
    </div>
@stop