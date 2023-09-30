<form method="POST" action="/carEvents" enctype="multipart/form-data">

    @csrf


  

    <div class="mb-6">
      <label for="event_name" class="">Event name</label>
      <input type="text" class="" name="event_name"
        value="{{old('event_name')}}" />

      @error('event_name')
      <p class="text-red-500 text-xs mt-1">{{$message}}</p>
      @enderror
    </div>


    <div class="mb-6">
        <label for="venue" class="">Venue</label>
        <input type="text" class="border border-gray-200 rounded p-2 w-full" name="venue"
          value="{{old('venue')}}" />
  
        @error('venue')
        <p class="text-red-500 text-xs mt-1">{{$message}}</p>
        @enderror
      </div>

      <div class="mb-6">
        <label for="ticket_price" class="">Ticket Price</label>
        <input type="number" class="border border-gray-200 rounded p-2 w-full" name="ticket_price"
          value="{{old('ticket_price')}}" />
  
        @error('ticket_price')
        <p class="text-red-500 text-xs mt-1">{{$message}}</p>
        @enderror
      </div>

      <div class="mb-6">
        <label for="event_date" class="">Event Date</label>
        <input type="date" class="border border-gray-200 rounded p-2 w-full" name="event_date"
          value="{{old('event_date')}}" />
  
        @error('event_date')
        <p class="text-red-500 text-xs mt-1">{{$message}}</p>
        @enderror
      </div>

      <div class="mb-6">
        <button class="bg-laravel text-white rounded py-2 px-4 hover:bg-black">
          Create Post
        </button>

        <a href="/carEvents" class="text-black ml-4"> Back </a>
      </div>

</form>