import '../css/app.css'
import {fromJSON} from "postcss";
// const axios = require('axios');



window.dataTable = function (input) {
    return {
        items: [],
        fields: input.fields,
        loading:true,
        initLoad:true,
        query: input.query,
        itemLimit: input.limit,
        currentPage: input.page,
        sort_field: input.sort_field,
        sort_direction: input.sort_direction,
        limitOptions:input.limitOptions,
        total:input.total,
        ajaxUrl:input.url,
        fromTo:'0',
        initData() {
            this.getDataFromServer()
        },
        search(event) {
            event.preventDefault();
            if(event.keyCode === 13){
                this.getDataFromServer();
            }else{
                this.query = event.target.value;
            }
        },
        sort(field, direction) {
            this.sort_field = field
            this.sort_direction = direction
            this.getDataFromServer();
        },
        setLimit(limit){
            this.itemLimit = limit;
            this.getDataFromServer()
        },
        nextPage() {
            let totalPages = Math.ceil(this.total/this.itemLimit);
            if(this.currentPage < totalPages){
                this.currentPage = this.currentPage + 1;
            }
            this.getDataFromServer()
        },
        prevPage() {
            if(this.currentPage > 1){
                this.currentPage = this.currentPage - 1;
            }
            this.getDataFromServer();
        },
        isEmpty() {
            return (this.items.length === 0 && this.loading === false)
        },
        fromToOutput() {
            this.fromTo = `${(this.itemLimit * this.currentPage) - (this.itemLimit - 1)} - ${this.items.length < this.itemLimit ? (((this.itemLimit * this.currentPage) - (this.itemLimit - 1)) + (this.items.length - 1))  : (this.itemLimit * this.currentPage)}`
        },
        insertUrlParam() {
            if (history.pushState) {
                let searchParams = new URLSearchParams(window.location.search);
                searchParams.set('limit', this.itemLimit);
                searchParams.set('page', this.currentPage);
                searchParams.set('sort_field', this.sort_field);
                searchParams.set('sort_direction', this.sort_direction);
                searchParams.set('query', this.query);
                let newurl = window.location.protocol + "//" + window.location.host + window.location.pathname + '?' + searchParams.toString();
                window.history.pushState({path: newurl}, '', newurl);
            }
        },
        getDataFromServer() {
            let self = this;
            self.loading = true;
            axios.post(self.ajaxUrl, {
                limit:self.itemLimit,
                query:self.query,
                page:self.currentPage,
                sort_field:self.sort_field,
                sort_direction:self.sort_direction,
            }).then(function (response) {
                    self.items = response.data.items;
                    self.total = response.data.total;
                    self.fromToOutput();
                    self.loading = false;
                    self.initLoad = false;
                    self.insertUrlParam();
            })
            .catch(function (error) {
                console.log(error);
            });
        },
    }
}

document.addEventListener('alpine:init', () => {
    Alpine.data('dropdown', () => ({
        dropOpen: false,

        toggle() {
            this.dropOpen = ! this.dropOpen
        },
        close() {
            this.dropOpen = false;
        }
    }))
})