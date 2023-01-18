@extends('layouts.main')

@section('container')
<style>
   .img_card{
      transition:cubic-bezier(1, 0, 0, 1);
   }
   .hero-image{
  
      position: relative;
   }
   .bg-hover{
      position: relative;
      background-color: black;
      opacity: .5;
      z-index: 0;
      width: 100%;
   }
   .coming--soon{
      position: absolute;
      top: 43%;
      left: 43%;
      max-width: 100%;
      /* color: white; */
      font-weight: 800;
      color: white;
      z-index: 3;
   }
</style>

<div class="row">
   <div class="col-md">
      <label for="" class="text-start font-weight-bold fs-5 text-dark">My Cards</label>
   </div>
   <div class="col-md text-end">
      <button onclick="history.back()" class="btn  btn-sm  text-white" style="background-color:#191a4d"
      type="button">back</button>
   </div>
</div>
{{-- <div class="col-12 d-flex justify-content-end">
  
</div> --}}

<div class="bg-info">
   <p class="coming--soon">Coming Soon</p>
</div>


<div class="row hero-image">
   

   <div class="col-md-12 bg-hover">
      <div class="d-flex my-2">

         <div class="col-md-5 img_card ">
            <div class=" text-start ">
               <img src="{{ asset('img/image-data/card-new.png') }}" alt="" class="img-fluid" style="width:20em;height:180px; z-index:-1">
            </div>
         </div>
         <div class="col-md-4 px-4">
            {{-- <table style="w3dth:100%">
               <tr>
                 <th class="text-sm text-dark">Name on Card</th>
                 <td class="text-sm text-dark">John</td>
               </tr>
               <tr>
                 <th class="text-sm text-dark">Address</th>
                 <td class="text-sm text-dark">Jakarta</td>
               </tr>
               <tr>
                 <th class="text-sm text-dark">Expiration Date</th>  
                 <td class="text-sm text-dark">20/2025</td>
               </tr>
             </table> --}}
             <div class="form-group row">
               <label for="" class="px-0">Name on Card</label>
               {{-- <input type="text" value="John Smith" class="form-control"> --}}
               <span class="px-1 text-xs">-</span>
             </div>
             <div class="form-group row">
               <label for="" class="px-0">Address</label>
               {{-- <input type="text" value="Jakarta" class="form-control"> --}}
               <span class="px-1 text-xs">-</span>

             </div>
             <div class="form-group row">
               <label for="" class="px-0">Expiration Date</label>
               {{-- <input type="text" value="20/2025" class="form-control"> --}}
               <span class="px-1 text-xs">-</span>

             </div>
         </div>   
         {{-- <div class="col-md-3 d-flex align-items-center justify-content-start ">
            <div class="row">
               <div class="col-md">
                  <button class="btn text-white" style="background: #191a4d">Add Card &nbsp; <i class="fa-solid fa-plus"></i></button>
               </div>
            </div>
         </div>     --}}
      </div>
   </div>
   {{-- <div class="col-md-4 d-flex align-items-center justify-content-start bg-info">
      <div class="row">
         <div class="col-md-3 d-flex align-items-center justify-content-start">
            <button class="btn text-white" style="background: #0677BA">Add Card &nbsp; <i class="fa-solid fa-plus"></i></button>
         </div>
      </div>

  
   </div> --}}
</div>
   
@endsection