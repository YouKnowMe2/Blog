<form action="" method="GET" class="md:flex justify-between">
    <div class="md:flex md:w-9/12 justify-between items-center">
        <div class="flex flex-col md:mx-3">

            <select id="sale" name="sale" class="border-gray-400 mb-3 md:mb-0 md:border-0 focus:ring-0">
                <option value="">Buy or Rent</option>
                <option value="1">Buy</option>
                <option value="0">Rent</option>
            </select>
        </div>

        <div class="py-3 self-center border-gray-500 border hidden md:block"></div>
        <div class="flex flex-col md:mx-3">

            <select id="location" name="location" class="border-gray-400 mb-3 md:mb-0 md:border-0 focus:ring-0">
                <option value="">Location</option>

                    <option  value="1">$location name}</option>

            </select>
        </div>

        <div class="py-3 self-center border-gray-500 border hidden md:block"></div>
        <div class="flex flex-col md:mx-3">

            <select id="type" name="type" class="border-gray-400 mb-3 md:mb-0 md:border-0 focus:ring-0">
                <option value="">Type</option>
                <option  value="0">Land</option>
                <option value="1">Apartment</option>
                <option  value="2">Villa</option>
            </select>
        </div>
        <div class="py-3 self-center border-gray-500 border hidden md:block"></div>
        <div class="flex flex-col md:mx-3">

            <select id="price" name="price" class="border-gray-400 mb-3 md:mb-0 md:border-0 focus:ring-0">
                <option value="">Price</option>
                <option  value="100000">0 - 100000</option>
                <option  value="200000">100000 - 200000</option>
                <option value="300000">200000 - 300000</option>
                <option  value="400000">300000 - 400000</option>
                <option  value="500000">400000 - 500000</option>
                <option value="500000+">500000+</option>
            </select>
        </div>
        <div class="py-3 self-center border-gray-500 border hidden md:block"></div>
        <div class="flex flex-col md:mx-3">

            <select id="bedrooms" name="bedrooms" class="border-gray-400 mb-3 md:mb-0 md:border-0 focus:ring-0">
                <option value="">Bedrooms</option>
                <option  value="1">1</option>
                <option  value="2">2</option>
                <option  value="3">3</option>
                <option  value="4">4</option>
                <option  value="5">5</option>
            </select>
        </div>
    </div>
    <div class="flex justify-between items-center md:w-3/12">
        <input name="property_name" value="" type="search" placeholder="Try to search for something" class="rounded-lg px-4 py-2 w-full mr-4 focus:border-gray-700 focus:ring-0">
        <button type="submit" class="btn">Search</button>
    </div>
</form>
