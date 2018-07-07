<template>
    <div>
        <hr>
        <div class="well well-sm" id="signature-form">
            <form class="form-horizontal" method="post" @submit.prevent="onSubmit">
                <fieldset>



                    <div class="row">
                        <label class="col-md-12 control-label" for="date">Type a date <a href="" class="" v-on:click.stop.prevent="randomDate()">(or randomize it <i class="fa fa-magic" aria-hidden="true"></i>)</a> </label>
                        <div class="col-md-9" :class="{'has-error': errors.date}">

                                <input
                                    @keyup="onSubmit()"
                                    @blur="outFocus()"
                                    @focus="setFocus()"
                                   id="date"
                                   v-model="date"
                                   type="text"
                                   placeholder="dd-mm-YYYY"
                                    autocomplete="off"
                                   class="form-control ">

                        </div>

                    </div>
                    <div class="clearfix"></div>
                    <div class="row mt-2">
                        <div class="col-md-12">
                            <span v-if="errors.date" class="text-danger"><i class="fa fa-exclamation-triangle" aria-hidden="true"></i> {{ errors.date[0] }}</span>
                        </div>
                    </div>

                    <div class="row">
                        <div class="col-md-12 ">
                            <span v-if="day_es" class="badge badge-secondary">ES: {{ day_es }}<br></span>
                            <span v-if="day_cat" class="badge badge-secondary">CAT: {{ day_cat }}<br></span>
                        </div>
                        <div class="col-md-12">
                            <span v-if="leapyear===true" class=" text-success display-3">{{year}} is leap year! <i class="fa fa-smile-o"></i></span>
                            <span v-if="leapyear===false" class=" text-info display-4">{{year}} is  not leap year...</span>
                        </div>
                    </div>

                    <div v-if="raw_response" class="help-block mt-1 col-md-12">
                        <hr>
                        Raw response <i class="fa fa-eye"></i>
                        <pre><code>{{ raw_response }}</code> </pre>
                    </div>
                </fieldset>
            </form>
        </div>
    </div>
</template>

<script>


//
    export default {
        //data model here

        data() {
            return {
                errors: [],
                date: '',
                raw_response: false,
                leapyear: null,
                day_es: null,
                day_cat:null,
            };
        },
        mounted() {
            document.getElementById('date').focus();
        },
        methods: {
            onSubmit() {
                const vm = this;
                const data_to_post = {
                    date: this.date
                };

                //ajax query to LeapYearController Class

                axios.post('leapyear', data_to_post)
                    .then(function (response) {

                        vm.raw_response = response;

                        if(response.data.errors){
                            vm.reset();
                            vm.errors = response.data.errors;
                        }else{
                            vm.leapyear = response.data.leapyear;
                            vm.day_es = response.data.day_es;
                            vm.day_cat = response.data.day_cat;
                            vm.year = response.data.year;
                            vm.errors=[];
                        }

                    })
                    .catch(function(response){
                        //To-do improve frontend error reporting
                        this.errors = 'Error on Ajax';
                    });
            },

            reset() {
                    this.errors= [];
                    this.leapyear= null;
                    this.day_es= null;
                    this.day_cat=null;
            },

            setFocus: function()
            {
                document.getElementById('lab').classList.add('green');
            },
            outFocus: function () {
                document.getElementById('lab').classList.remove('green');
            },
            randomDate:function(){

                var start = new Date(2012, 0, 1);
                var end = new Date();
                var random = new Date(start.getTime() + Math.random() * (end.getTime() - start.getTime()));
                this.date = ("0" + random.getDate()).slice(-2)+'-'+("0" + (random.getMonth() + 1)).slice(-2)+'-'+random.getFullYear();
                this.onSubmit()
                return false;
            }
        }
    }
</script>