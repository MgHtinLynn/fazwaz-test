<template>
  <div class="overflow-hidden relative flex-shrink-0 block lg:w-72">
    <img class="object-cover w-full h-48 sm:h-72 transition duration-300 flex-shrink-1 filter hover:scale-110"
         :src="photos.thumb" :srcset="`${photos.thumb} 1x, ${photos.full} 2x`"
         :alt="property.title" :title="property.title" width="288" height="240" loading="lazy">
  </div>
  <div class="flex flex-col flex-grow px-6 py-4 bg-white drop-shadow-md p-6 bg-white shadow-xl">
    <p class="pr-6 mb-1 font-semibold tracking-tight text-gray-900 truncate hover:text-primary"
       title="{{ property.title }}">{{ property.title }}</p>
    <span class="mb-2 text-xs font-medium">
            <svg xmlns="http://www.w3.org/2000/svg" viewBox="0 0 384 512"
                 fill="currentColor" width="12" class="fill-blue-600 inline align-top mr-1">
                <path
                    d="M192 0C85.97 0 0 85.97 0 192c0 77.41 26.97 99.03 172.3 309.7c9.531 13.77 29.91 13.77 39.44 0C357 291 384 269.4 384 192C384 85.97 298 0 192 0zM192 271.1c-44.13 0-80-35.88-80-80S147.9 111.1 192 111.1s80 35.88 80 80S236.1 271.1 192 271.1z">
                </path>
            </svg>
            {{ geo.street }} , {{ geo.province }} , {{ geo.country }}
    </span>
    <div class="flex mb-3 font-medium text-gray-900">
      {{ property.currency_symbol }}{{ Number(property.price).toLocaleString() }}
      <span
          class="inline-flex items-center px-2 py-0.5 rounded text-xs font-medium bg-blue-600 text-white ml-auto lg:ml-4">
        {{ property.property_type }}
      </span>
    </div>

    <div class="text-sm text-gray-600 mb-3">

      <span class="mr-4">
        <svg xmlns="http://www.w3.org/2000/svg" viewBox="0 0 640 512" fill="currentColor" height="20"
             class="inline align-text-bottom fill-blue-600 mr-1">
            <path
                d="M168 304C216.5 304 256 264.5 256 216S216.5 128 168 128S80 167.5 80 216S119.5 304 168 304zM168 176c21.1 0 40 18 40 40C208 238 189.1 256 168 256C145.1 256 128 238 128 216C128 194 145.1 176 168 176zM528 128h-224C295.2 128 288 135.2 288 144v192H48v-280C48 42.75 37.25 32 24 32S0 42.75 0 55.1V456C0 469.3 10.75 480 23.1 480S48 469.3 48 456V384h544v72C592 469.3 602.7 480 616 480S640 469.3 640 456V240C640 178.1 589.9 128 528 128zM592 336h-256v-160h192c35.25 0 64 28.75 64 64V336z">
             </path>
        </svg> {{ property.bedrooms }}
      </span>
      <span class="mr-4">
        <svg xmlns="http://www.w3.org/2000/svg" viewBox="0 0 512 512" fill="currentColor" height="20"
             class="inline align-text-bottom fill-blue-600 mr-1">
            <path
                d="M488 256.1H80V69.36c0-8.623 5.25-16.37 13.12-19.62c8-3.25 17.12-1.5 23.12 4.623l3.162 3.162C106.4 84.63 110.9 117.1 133.4 140.5l14.84 14.85c-5.936 9.285-5.281 21.56 2.834 29.67C155.7 189.7 161.9 192 168 192s12.28-2.344 16.97-7.031l96-96c9.375-9.375 9.375-24.56 0-33.94c-4.562-4.562-10.44-6.768-16.36-6.766c-4.609 0-9.246 1.334-13.31 3.932L236.5 37.35C213.1 14.86 180.5 10.42 153.4 23.49L151.9 22.01C136.4 6.529 114.8-2.289 93.04 .5156C57.11 5.158 32 35.21 32 69.36v186.7L24 256.1c-13.25 0-24 10.71-24 23.96s10.75 24.02 24 24.02H32v79.96c0 27.12 11.75 52.97 32 71.09v32.9C64 501.3 74.75 512 88 512s24-10.74 24-23.99v-9.623c5.25 1 10.62 1.495 16 1.62h256c5.375-.125 10.75-.6198 16-1.62v9.623C400 501.3 410.7 512 424 512S448 501.3 448 488v-32.9c20.25-18.12 32-43.97 32-71.09V304.1h8c13.25 0 24-10.77 24-24.02S501.3 256.1 488 256.1zM202.5 71.29l14.13 14.13L181.4 120.6L167.3 106.5C157.6 96.8 157.6 81 167.3 71.29C177 61.57 192.8 61.55 202.5 71.29zM432 384c0 26.49-21.5 47.99-48 47.99H128c-26.5 0-48-21.49-48-47.99V304.1h352V384z">
            </path>
        </svg> {{ property.bathrooms }}
      </span>

      <span class="mr-4">
        <svg xmlns="http://www.w3.org/2000/svg" viewBox="0 0 576 512" fill="currentColor" height="20"
             class="inline align-text-bottom fill-blue-600 mr-1">
            <path
                d="M554.1 83.5L318.4 4.875C308.5 1.625 298.3 0 288 0S267.5 1.625 257.6 4.875L21.88 83.5C8.875 87.87 0 100.1 0 113.9v310.8c0 15 10.38 28 25 31.25l242.1 53.88C273.1 511.2 281 511.1 288 511.1s13.1-.75 20.88-2.25l242.1-53.88C565.6 452.6 576 439.6 576 424.6V113.9C576 100.1 567.3 87.87 554.1 83.5zM528 251.6l-60.13-15.17c-8.641-2.156-17.27 3.062-19.39 11.66c-2.156 8.562 3.062 17.25 11.64 19.41L528 284.5v127.4l-229.6 51c-4.125 .875-11.62 2-20.75 0L48 411.9V284.5l67.88-16.97c8.578-2.156 13.8-10.84 11.64-19.41c-2.141-8.594-10.83-13.78-19.39-11.66L48 251.6V214.3l228.5-68.5c7.5-2.375 15.5-2.25 23 0L528 214.3V251.6zM528 164.1l-214.8-64.38c-16.5-5-34-5-50.5 0L48 164.1V125.4L272.9 50.5c5.625-2 17-4.5 30.25 0L528 125.4V164.1zM316.1 231.5l80 20C397.4 251.8 398.7 252 400 252c7.172 0 13.69-4.844 15.5-12.12c2.156-8.562-3.062-17.25-11.64-19.41l-80-20c-8.562-2.125-17.27 3.062-19.39 11.66C302.3 220.7 307.5 229.4 316.1 231.5zM252.1 200.5l-80 20C163.5 222.6 158.3 231.3 160.5 239.9C162.3 247.2 168.8 252 175.1 252c1.281 0 2.594-.1562 3.891-.4687l80-20c8.578-2.156 13.8-10.84 11.64-19.41C269.4 203.6 260.6 198.4 252.1 200.5z">
            </path>
        </svg>
        {{ property.area }} {{ property.area_type }}
      </span>
    </div>
    <p class="text-xs leading-normal text-gray-500 mb-2">{{ property.description }}</p>
  </div>
</template>
<script>
import property from "./PropertyCard.vue";

export default {
  props: ['property'],
  data() {
    return {
      geo: JSON.parse(this.property.geo),
      photos: JSON.parse(this.property.photos)
    }
  }
}
</script>