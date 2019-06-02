{{-- /**
* Created by gilasweb.ir.
* User: paydar / sayed sajjad aleemohaammad (aleemohammad.ir)
* Date: 1/23/2019
* Time: 4:00 AM
*/ --}}

@extends('theme.themelayout')
@section('content')
    <div class="container-fluid">
        <div class="row  sin2"></div>
    </div>
    <div class="container pt-0 mt-0 IRANSans" style="min-height: 53vh">
        <div class="row pt-0 mt-0">
            @if(count($allcontents))
                <div class="col-md-12 my-4 text-center d-flex justify-content-center align-items-center align-content-center">
                    <!-- start-page-pagination -->
                    <ul class="pagination p-0 m-0 d-flex justify-content-center align-items-center">
                        <li class="page-item"><a class="font-weight-bold btn btn-md btn-outline-dark" href="?page=1" aria-label="Previous"><span
                                        aria-hidden="true">&laquo;</span></a></li>
                        @for($ipn=1; $ipn<=$allcontents->lastPage(); $ipn++)
                            @if(isset($_GET['page']) && $_GET['page'] != 1)
                                <?php $l1 = $_GET['page'] - 2; $l2 = $_GET['page'] + 2;?>
                                @if($l1 <=  $ipn  && $ipn  <= $l2 )
                                    <li class="page-item <?php if (isset($_GET['page']) && $_GET['page'] == $ipn) {echo 'active';}elseif(!isset($_GET['page']) && $ipn == 1){echo 'active';}?>"><a class="text-light font-weight-bold  btn bg-dark btn-outline-dark" href="?page={{$ipn}}">{{$ipn}}</a></li>
                                @endif @else @if(1 <=  $ipn  && $ipn  <= 5)
                                <li class="page-item <?php if (isset($_GET['page']) && $_GET['page'] == $ipn) {echo 'active';}elseif(!isset($_GET['page']) && $ipn == 1){echo 'active';}?>"><a class="text-light font-weight-bold btn bg-dark btn-outline-dark" href="?page={{$ipn}}">{{$ipn}}</a></li>
                            @endif @endif @endfor
                        <li class="page-item"><a class="font-weight-bold btn btn-md btn-outline-dark" href="<?php echo "?page=" . $allcontents->lastPage(); ?>"
                                                 aria-label="Next"><span aria-hidden="true">&raquo;</span></a></li>
                    </ul>
                    <!-- finish-page-pagination -->
                </div>
                @foreach($allcontents as $content)
                    <div class="col-md-4 col-sm-6">
                        <a class="text-decoration-none text-right text-dark" href="{{route('show_single_sll',['content'=>$content->slug])}}" dir="rtl" style="text-decoration: none">
                            <img style="height: 200px; object-fit: cover" class="w-100 rounded img-fluid" src="{{$content->imgpath}}"/>
                            <h5 class="text-decoration-none text-muted p-3">
                                {{$content->title}}
                            </h5>
                        </a>
                    </div>
                @endforeach
                <div class="col-md-12 mb-5 mt-4 text-center d-flex justify-content-center align-items-center align-content-center">
                    <!-- start-page-pagination -->
                    <ul class="pagination p-0 m-0 d-flex justify-content-center align-items-center">
                        <li class="page-item"><a class="font-weight-bold btn btn-md btn-outline-dark" href="?page=1" aria-label="Previous"><span
                                        aria-hidden="true">&laquo;</span></a></li>
                        @for($ipn=1; $ipn<=$allcontents->lastPage(); $ipn++)
                            @if(isset($_GET['page']) && $_GET['page'] != 1)
                                <?php $l1 = $_GET['page'] - 2; $l2 = $_GET['page'] + 2;?>
                                @if($l1 <=  $ipn  && $ipn  <= $l2 )
                                    <li class="page-item <?php if (isset($_GET['page']) && $_GET['page'] == $ipn) {echo 'active';}elseif(!isset($_GET['page']) && $ipn == 1){echo 'active';}?>"><a class="text-light font-weight-bold  btn bg-dark btn-outline-dark" href="?page={{$ipn}}">{{$ipn}}</a></li>
                                @endif @else @if(1 <=  $ipn  && $ipn  <= 5)
                                <li class="page-item <?php if (isset($_GET['page']) && $_GET['page'] == $ipn) {echo 'active';}elseif(!isset($_GET['page']) && $ipn == 1){echo 'active';}?>"><a class="text-light font-weight-bold btn bg-dark btn-outline-dark" href="?page={{$ipn}}">{{$ipn}}</a></li>
                            @endif @endif @endfor
                        <li class="page-item"><a class="font-weight-bold btn btn-md btn-outline-dark" href="<?php echo "?page=" . $allcontents->lastPage(); ?>"
                                                 aria-label="Next"><span aria-hidden="true">&raquo;</span></a></li>
                    </ul>
                    <!-- finish-page-pagination -->
                </div>
            @else
                <div class="col-md-12 py-5 my-5  text-center">
                 <span class="alert alert-danger h3">
                 هنوز محتوایی منتشر نشده
                 </span>
                </div>
            @endif
        </div>
    </div>
@endsection