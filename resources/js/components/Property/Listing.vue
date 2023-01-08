<template>
  <div class="w-full mb-4">
    <div class="bg-transparent shadow-md w-full">
      <nav class="flex container justify-between p-6 px-4 mx-auto">
        <div class="flex justify-between items-center w-full">
          <div class="font-semibold text-2xl">
            <a class="block max-w-max" title="home" href="">
              <span></span>
            </a>
          </div>

          <div class="hidden sm:block w-full flex justify-center">

            <div class="flex max-w-xl lg:max-w-2xl mx-auto w-full">

              <div class="relative w-full flex space-x-4">

                <div class="relative flex py-3">
                  <div class="flex h-5 items-center">
                    <input id="sale" v-model="saleOnly" aria-describedby="sale" name="sale" type="checkbox"
                           class="h-4 w-4 rounded border-gray-300 text-indigo-600 focus:ring-indigo-500"/>
                  </div>
                  <div class="ml-3 text-sm">
                    <label for="sale" class="font-medium text-gray-700">Sale</label>
                  </div>
                </div>

                <div class="relative flex py-3">
                  <div class="flex h-5 items-center">
                    <input id="sold" v-model="soldOnly" aria-describedby="sold" name="sold" type="checkbox"
                           class="h-4 w-4 rounded border-gray-300 text-indigo-600 focus:ring-indigo-500"/>
                  </div>
                  <div class="ml-3 text-sm">
                    <label for="sold" class="font-medium text-gray-700">Sold</label>
                  </div>
                </div>

                <input @keypress.enter="getResults()" type="text" id="search_name" name="search"
                       v-model="search_keyword"
                       class="w-full h-11 border border-gray-300 rounded-md bg-white shadow pl-4 pr-12"
                       placeholder="Search with title and locations">

                <button @click="getResults()"
                        class="bg-blue-600 text-white absolute top-[50%] -translate-y-1/2 right-1 p-3 rounded-md">
                  <svg xmlns="http://www.w3.org/2000/svg" width="24" height="24" viewBox="0 0 24 24" fill="none"
                       stroke="currentColor" stroke-width="2" stroke-linecap="round" stroke-linejoin="round"
                       class="w-4 h-4">
                    <circle cx="11" cy="11" r="8"></circle>
                    <line x1="21" y1="21" x2="16.65" y2="16.65"></line>
                  </svg>
                </button>
              </div>

            </div>

          </div>

        </div>
      </nav>

    </div>
    <div class="flex md:container md:mx-auto px-4 pt-6">
      <div>

        <spinner v-if="isBusy" class="my-3"></spinner>


        <div v-if="items.length > 0" v-for="item in items"
             class="relative flex flex-col max-w-lg mx-auto mb-8 overflow-hidden rounded-lg lg:flex-row lg:max-w-full">
          <property-card :property="item"/>
        </div>
        <div v-else>
            <p>Not Data Found</p>
        </div>
      </div>
    </div>
    <div class="flex h-11">
      <TailwindPagination
          size="large"
          :data="properties"
          @pagination-change-page="getResults"
      />
    </div>
  </div>
</template>

<script>
import { TailwindPagination } from 'laravel-vue-pagination';

export default {
  props: ["url", "province"], // init value from laravel blade
  name: "Listing.vue",
  components: {
    TailwindPagination
  },
  created() {
    // getting the result from api
    this.getResults();
  },
  data() {
    return {
      items: [],
      pagination: [],
      search_keyword: '',
      isBusy: false,
      saleOnly: false,
      soldOnly: false,
      properties: {
        type: Object,
        default: null
      }
    }
  },
  watch: {
    saleOnly() {
      this.getResults()
    },
    soldOnly() {
      this.getResults()
    },
  },
  methods: {
    getResults(page = 1) {
      this.isBusy = true

      let params = {
        page
      }
      if (this.province !== '') {
        params.province = this.province
      }

      if (this.search !== '') {
        params.search = this.search_keyword
      }

      if (this.soldOnly) {
        params.sold = true
      }

      if (this.saleOnly) {
        params.sale = true
      }

      axios.get(this.url, {params}).then(response => {
        console.log('response', response)
        this.properties = response.data
        this.isBusy = false
        this.items = response.data.data;
      }).catch(error => {
        this.isBusy = false
      })

    },
    filter(payload) {
      this.filter_keyword = payload;
      this.getResults();
    }
  }
}
</script>