<form wire:submit.prevent='store'>  
{{-- @livewire('flash-message')             --}}
@if (session()->has('message'))
<div class="alert alert-success alert-block">
    <strong>{{ session()->get('message') }}</strong>
    <button type="button" class="close" data-dismiss="alert">&times;</button>
    
</div>
@endif
@include('home.flash-message')
<h5>Write Your Review:</h5>
@csrf
<div class="form-group">
  {{-- <label for="formGroupExampleInput2">Another label</label> --}}
  <input type="text" class="form-control" wire:model="subject" placeholder="Subject">
  @error('subject') <span class="text-danger">{{$message}}</span>@enderror  
</div>
<br />
<div class="form-group">
  {{-- <label for="formGroupExampleInput2">Another label</label> --}}
  <textarea type="text" class="form-control" wire:model="review" placeholder="Your Review..." rows="5"></textarea>
  @error('review') <span class="text-danger">{{$message}}</span>@enderror
</div>
<br />
<div class="form-group">
    @error('rate') <span class="text-danger">{{$message}}</span>@enderror
  <h6>Your Rating:</h6>
    <fieldset class="rate">
        <input type="radio" id="star5" wire:model="rate" value="5" /><label class = "full" for="star5" title="Awesome - 5 stars"></label>
        <input type="radio" id="star4half" wire:model="rate" value="4.5" /><label class="half" for="star4half" title="Pretty good - 4.5 stars"></label>
        <input type="radio" id="star4" wire:model="rate" value="4" /><label class = "full" for="star4" title="Pretty good - 4 stars"></label>
        <input type="radio" id="star3half" wire:model="rate" value="3.5" /><label class="half" for="star3half" title="Meh - 3.5 stars"></label>
        <input type="radio" id="star3" wire:model="rate" value="3" /><label class = "full" for="star3" title="Meh - 3 stars"></label>
        <input type="radio" id="star2half" wire:model="rate" value="2.5" /><label class="half" for="star2half" title="Kinda bad - 2.5 stars"></label>
        <input type="radio" id="star2" wire:model="rate" value="2" /><label class = "full" for="star2" title="Kinda bad - 2 stars"></label>
        <input type="radio" id="star1half" wire:model="rate" value="1.5" /><label class="half" for="star1half" title="Meh - 1.5 stars"></label>
        <input type="radio" id="star1" wire:model="rate" value="1" /><label class = "full" for="star1" title="Sucks big time - 1 star"></label>
        <input type="radio" id="starhalf" wire:model="rate" value="0.5" /><label class="half" for="starhalf" title="Sucks big time - 0.5 stars"></label>
    </fieldset>
    @if (Auth::check())
      
    @else
    <br /><br />
    <div class="form-group" style="text-align: center"><h6><a href="{{route('loginHome')}}">Please Login To Submit Your Review...</a></h6></div>
    @endif
</div>
<br />
@if (Auth::check())
  <div class="form-group" style="text-align: center"><button type="submit" class="btn btn-danger" >Post Review</button></div>
@else

@endif
</form>