@if(session()->has('success'))

    <div class="padtop_s">
   <div class="major_event">
   <ul>
   <li>
<div class="exp_event">
  <img width="16" height="16" src="{{ asset('public/storage/images/exp.png') }}" />  
{{ session()->get('success') }}

</div></li>
   </ul>
</div>
</div>
@endif
