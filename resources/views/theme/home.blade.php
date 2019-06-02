{{-- /**
* Created by gilasweb.ir.
* User: paydar / sayed sajjad aleemohaammad (aleemohammad.ir)
* Date: 1/23/2019
* Time: 4:00 AM
*/ --}}
@extends('theme.themelayout')
@section('content')
    <div class="container-fluid">

        @if(isset($allbanner) && count($allbanner))
        <div class="row">
            <div class="w-100" style="height:72vh; overflow: hidden" dir="rtl">
                <div class="bd-example">
                    <div id="carouselExampleCaptions" class="carousel slide" data-ride="carousel">
                        <div class="carousel-inner bootslider">
                            @php $activeclass="active"; @endphp
                            @foreach($allbanner as $singlebanner)
                            @if($singlebanner->father == "lg_slider")
                            <div class="carousel-item {{$activeclass}}">
                                <img src="{{$singlebanner->imgpath}}" class="d-block w-100" alt="{{$singlebanner->title}}" >
                                <div class="carousel-caption d-none d-md-block ">
                                    <h1 class="candyclass">{{$singlebanner->title}}</h1>
                                    <p class="d-none p-4 h3 candyclass">لورم ایپسوم متن ساختگی با تولید سادگی نامفهوم از صنعت چاپ و با استفاده از طراحان گرافیک است.</p>
                                </div>
                                <div class="carousel-caption-xs d-block d-md-none">
                                    <h4 class="d-block d-md-none candyclass" style="line-height: 50px">{{$singlebanner->title}}</h4>
                                    <p class="d-none p-4 h3 candyclass">لورم ایپسوم متن ساختگی با تولید سادگی نامفهوم از صنعت چاپ و با استفاده از طراحان گرافیک است.</p>
                                </div>
                            </div>
                            @endif
                            <?php $activeclass="";?>
                            @endforeach

                        </div>
                        <a class="carousel-control-prev" href="#carouselExampleCaptions" role="button" data-slide="prev">
                            <span class="carousel-control-prev-icon" aria-hidden="true"></span>
                            <span class="sr-only">Previous</span>
                        </a>
                        <a class="carousel-control-next" href="#carouselExampleCaptions" role="button" data-slide="next">
                            <span class="carousel-control-next-icon" aria-hidden="true"></span>
                            <span class="sr-only">Next</span>
                        </a>
                    </div>
                </div>
            </div>
        </div>
        @endif

        <div class="row  sin2">
        </div>
    </div>
    <div class="container">
        <div class="row my-5">
            <div class="text-center col-md-12 IRANSans text-right">
                <p class="h5">چرا ما متمایز هستیم؟<i class="p-2 fas fa-briefcase"></i></p>
                <hr>
            </div>
            <div class="mr-sm-0 pr-sm-0  col-md-6">
                <div class="w-100 h-100 jumbotron text-right IRANSans" dir="rtl">
                    لورم ایپسوم متن ساختگی با تولید سادگی نامفهوم از صنعت چاپ و با استفاده از طراحان گرافیک است. چاپگرها
                    و متون بلکه روزنامه و مجله در ستون و سطرآنچنان که لازم است و برای شرایط فعلی تکنولوژی مورد نیاز و
                    کاربردهای متنوع با هدف بهبود ابزارهای کاربردی می باشد. کتابهای زیادی در شصت و سه درصد گذشته، حال و
                    آینده شناخت فراوان جامعه و متخصصان را می طلبد تا با نرم افزارها شناخت بیشتری را برای طراحان رایانه
                    ای علی الخصوص طراحان خلاقی و فرهنگ پیشرو در زبان فارسی ایجاد کرد. در این صورت می توان امید داشت که
                    تمام و دشواری موجود در ارائه راهکارها و شرایط سخت تایپ به پایان رسد وزمان مورد نیاز شامل حروفچینی
                    دستاوردهای اصلی و جوابگوی سوالات پیوسته اهل دنیای موجود طراحی اساسا مورد استفاده قرار گیرد.
                </div>
            </div>
            <div class="ml-sm-0 pl-sm-0  col-md-6">
                <img src="{{$generalinfo['24']->value}}" class="w-100 h-100" style="object-fit: cover">
            </div>
        </div>

        <div class="row my-5 px-sm-2">
            <div class="text-center col-md-12 IRANSans text-right">
                <p class="h5">کیفیت ما ضامن پیشرفت ماست<i class="p-2 fas fa-chart-line"></i></p>
                <hr>
            </div>
            <div class="mx-sm-0 px-sm-0  col-md-6">
                <script src="https://code.highcharts.com/highcharts.js"></script>
                <div id="chartcontainer" dir="rtl"></div>
            </div>
            <div class="mx-sm-0 px-sm-0  col-md-6 card">
                <table class="table table-striped  text-center " dir="rtl">
                    <thead>
                    <tr>
                        <th scope="col">#</th>
                        <th scope="col">عنوان پروژه</th>
                        <th scope="col">موضوع</th>
                        <th scope="col">تاریخ</th>
                    </tr>
                    </thead>
                    <tbody>
                    <tr>
                        <th scope="row">1</th>
                        <td>تست</td>
                        <td>تست</td>
                        <td>تست</td>
                    </tr>
                    <tr>
                        <th scope="row">2</th>
                        <td>تست</td>
                        <td>تست</td>
                        <td>تست</td>
                    </tr>
                    <tr>
                        <th scope="row">3</th>
                        <td>تست</td>
                        <td>تست</td>
                        <td>تست</td>
                    </tr>
                    <tr>
                        <th scope="row">4</th>
                        <td>تست</td>
                        <td>تست</td>
                        <td>تست</td>
                    </tr>
                    <tr>
                        <th scope="row">5</th>
                        <td>تست</td>
                        <td>تست</td>
                        <td>تست</td>
                    </tr>
                    <tr>
                        <th scope="row">6</th>
                        <td>تست</td>
                        <td>تست</td>
                        <td>تست</td>
                    </tr>
                    <tr>
                        <th scope="row">7</th>
                        <td>تست</td>
                        <td>تست</td>
                        <td>تست</td>
                    </tr>
                    </tbody>
                </table>
            </div>
        </div>


        <div class="row my-5 d-none d-md-block">
            <div class="text-center col-md-12 IRANSans text-right">
                <p class="h5">گالری تصاویر<i class="p-2 far fa-images"></i></p>
                <hr>
            </div>
            <div class="w-100" style="height: 30vh; margin-top: -1em">
                <fieldset>
                    <div class="slider">
                        <input type="radio" name="rSlide" id="rsl-1" class="d-none slider__control" checked/>
                        <input type="radio" name="rSlide" id="rsl-2" class="d-none slider__control"/>
                        <input type="radio" name="rSlide" id="rsl-3" class="d-none slider__control"/>
                        <input type="radio" name="rSlide" id="rsl-4" class="d-none slider__control"/>
                        <input type="radio" name="rSlide" id="rsl-5" class="d-none slider__control"/>
                        <ul class="slider__list">
                            @php $activeclass=1; @endphp
                            @foreach($allbanner as $singlebanner)
                                @if($singlebanner->father == "sm_slider")
                                    <li class="slider__item">
                                        <label for="rsl-{{$activeclass}}" class="slider__label slider__label-{{$activeclass}}">
                                            <div class="row fair-hover">
                                                <div class="col-lg-12 fair-hover-center text-center" dir="rtl">
                                                    <img src="{{$singlebanner->imgpath}}" title="{{$singlebanner->title}}" alt="{{$singlebanner->title}}" style="width: 100%; height: 25vh; object-fit: cover">
                                                    <small style="position: relative; z-index: 0">{{$singlebanner->title}}</small>
                                                </div>
                                            </div>
                                        </label>
                                    </li>
                                    <?php $activeclass++;?>
                                @endif
                            @endforeach
                        </ul>
                    </div>
                </fieldset>
            </div>
        </div>
        <div class="row mb-4 mt-5">
            <div class="text-center col-md-12 IRANSans text-right">
                <p class="h5">خدمات قابل ارائه<i class="p-2 fas fa-briefcase"></i></p>
                <hr>
            </div>
            <section id="services" class="text-dark">
                <div class="row px-md-2">
                    <div class="col-lg-3 col-sm-6 d-flex justify-content-center pb-3">
                        <a href="#" style=" text-decoration: none;">
                            <div class="services">
                                <div class="service-wrap">
                                    <i class="fab fa-adn"></i>
                                    <h3>تست عنوان</h3>
                                    <p>لورم ایپسوم متن ساختگی با تولید سادگی نامفهوم از صنعت چاپ و با استفاده از طراحان
                                        گرافیک است.</p>
                                </div>
                            </div>
                        </a>
                    </div>
                    <div class="col-lg-3 col-sm-6 d-flex justify-content-center pb-3">
                        <a href="#" style=" text-decoration: none;">
                            <div class="services">
                                <div class="service-wrap">
                                    <i class="fab fa-adn"></i>
                                    <h3>تست عنوان</h3>
                                    <p>لورم ایپسوم متن ساختگی با تولید سادگی نامفهوم از صنعت چاپ و با استفاده از طراحان
                                        گرافیک است.</p>
                                </div>
                            </div>
                        </a>
                    </div>
                    <div class="col-lg-3 col-sm-6 d-flex justify-content-center pb-3">
                        <a href="#" style=" text-decoration: none;">
                            <div class="services">
                                <div class="service-wrap">
                                    <i class="fab fa-adn"></i>
                                    <h3>تست عنوان</h3>
                                    <p>لورم ایپسوم متن ساختگی با تولید سادگی نامفهوم از صنعت چاپ و با استفاده از طراحان
                                        گرافیک است.</p>
                                </div>
                            </div>
                        </a>
                    </div>
                    <div class="col-lg-3 col-sm-6 d-flex justify-content-center pb-3">
                        <a href="#" style=" text-decoration: none;">
                            <div class="services">
                                <div class="service-wrap">
                                    <i class="fab fa-adn"></i>
                                    <h3>تست عنوان</h3>
                                    <p>لورم ایپسوم متن ساختگی با تولید سادگی نامفهوم از صنعت چاپ و با استفاده از طراحان
                                        گرافیک است.</p>
                                </div>
                            </div>
                        </a>
                    </div>
                </div>
            </section>
        </div>
            @if(count($allcontentspost))
                <div class="text-center col-md-12 IRANSans text-right">
                    <p class="h5">آخرین مطالب<i class="p-2 far fa-newspaper"></i></p>
                    <hr>
                </div>
                <div class="w-100 slickclassselector">
                    @foreach($allcontentspost as $content)
                        <div class="slide">
                            <a class="text-decoration-none text-right text-dark" href="{{route('show_single_sll',['content'=>$content->slug])}}" dir="rtl" style="text-decoration: none">
                                <img class="rounded img-fluid" src="{{$content->imgpath}}"/>
                                <h5 class="text-decoration-none text-muted p-3">
                                {{$content->title}}
                                </h5>
                            </a>
                        </div>
                    @endforeach
                </div>
            @endif
        <div class=" my-5 ">
            <div class="text-center col-md-12 IRANSans text-right">
                <p class="h5">همکاران/مشتریان ما<i class="p-2 far fa-handshake"></i></p>
                <hr>
            </div>
            <div class="customer-logos">
                @foreach($allbanner as $singlebanner)
                    @if($singlebanner->father == "vendor_slider")
                        <div class="slide"><a href="#"><img src="{{$singlebanner->imgpath}}" alt="{{$singlebanner->title}}"></a></div>
                    @endif
                @endforeach
            </div>
        </div>
    </div>
@endsection
