
<H1>EDIT CAR</H1>
<form method="POST" action="/cars/{{$car->id}}" enctype="multipart/form-data">

    @csrf
    @method('PUT')
    <div class="mb-6">
      <label for="make" class="">Make</label>
      <input type="text" class="" name="make"
        value="{{$car->make}}" />

      @error('make')
      <p class="text-red-500 text-xs mt-1">{{$message}}</p>
      @enderror
    </div>


    <div class="mb-6">
        <label for="model" class="">Model</label>
        <input type="text" class="border border-gray-200 rounded p-2 w-full" name="model"
          value="{{$car->model}}" />
  
        @error('model')
        <p class="text-red-500 text-xs mt-1">{{$message}}</p>
        @enderror
      </div>

      <div class="mb-6">
        <label for="price" class="">Price</label>
        <input type="text" class="border border-gray-200 rounded p-2 w-full" name="price"
          value="{{$car->price}}" />
  
        @error('price')
        <p class="text-red-500 text-xs mt-1">{{$message}}</p>
        @enderror
      </div>

      <div class="mb-6">
        <label for="year" class="">Year</label>
        <input type="text" class="border border-gray-200 rounded p-2 w-full" name="year"
          value="{{$car->year}}" />
  
        @error('year')
        <p class="text-red-500 text-xs mt-1">{{$message}}</p>
        @enderror
      </div>

      <div class="mb-6">
        <button class="bg-laravel text-white rounded py-2 px-4 hover:bg-black">
          Edit Post
        </button>

        <a href="/cars" class="text-black ml-4"> Back </a>
      </div>

</form>