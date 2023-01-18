@extends('layouts.gamm')
@section('content')


<div class="block">
    <h3>Продукты</h3>




  @foreach($stockList as $stockList)




        <div>
            <ul class="delim-list">

                    <li class="padtop_s first-li">
                        <div class="linebottom">
                        <img class="icon" width="48" height="48" src="/Themes/images/medicines/medicine52.png"/>
                        <span class="warehouse_count"> {{ $stockList->amount }} шт. </span><span class="warehouse-drugtitle">{{ $stockList->medicines_name }}</span>
                    
                        <div style="clear: both"></div>
                    </div>
                    </li>



            </ul>

        </div>
        @endforeach

          </div>

@endsection
