import './bootstrap';

import { createApp } from 'vue'
import PropertyListing from './components/Property/Listing.vue'
import PropertyCard from './components/Property/PropertyCard.vue'
import Spinner from "./components/Spinner.vue";

const app = createApp({});
app.component('property-listing', PropertyListing);
app.component('property-card', PropertyCard);
app.component('spinner', Spinner);
app.mount('#app');
