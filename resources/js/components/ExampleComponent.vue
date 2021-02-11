<template>
    <div class="container-fluid">
        <div class="row justify-content-center">
            <div class="col-md-12">
                <div class=" bg-light">
                    <div class="card card-info card-outline">
                        <div class="card-header">
                            <h3 class="card-title">Balance sheet List project name : {{$store.state.name}}</h3>
                            <div class="card-tools"><button type="button" data-widget="collapse" class="btn btn-tool"><i class="fas fa-plus"></i></button></div>
                        </div>
                        <div class="card-body" style="display: block;">
                            <table class="table table-striped journal_lists table table-hover table-bordered">
                                <thead>
                                <tr>
                                    <th colspan="1" class="text-center">#SL</th>
                                    <th colspan="3" class="text-center">Journal No</th>
                                    <th colspan="2 " class="text-center">Accounts Name</th>
                                    <th colspan="2" class="text-center" width="15%">Company Name</th>
                                    <th colspan="3" class="text-right" width="10%">Debit Balance </th>
                                    <th colspan="2" class="text-right" width="10%">Credit Balance </th>
                                    <th colspan="2" class="text-center" width="10%">Date</th>
                                    <th>Action</th>
                                </tr>
                                </thead>
                                <tbody>
                                <tr style="padding: 5px;">
                                    <td class="text-center">01</td>
                                    <td class="text-center">Demo text</td>
                                    <td class="text-center">Demo text</td>
                                    <td class="text-center">Demo text</td>
                                    <td class="text-center">Demo text</td>
                                    <td class="text-center">Demo text</td>
                                    <td class="text-center">Demo text</td>
                                    <td class="text-center">Demo text</td>
                                    <td class="text-center">Demo text</td>
                                    <td class="text-center">Demo text</td>
                                    <td class="text-center">Demo text</td>
                                    <td class="text-center">Demo text</td>
                                    <td class="text-center">Demo text</td>
                                    <td class="text-center">Demo text</td>
                                    <td class="text-center">Demo text</td>
                                    <td class="text-center">Demo text</td>
                                </tr>
                                </tbody>
                            </table>
                        </div>
                    </div>
                    <div class="pull-right"></div>
                </div>
            </div>
        </div>
    </div>
</template>

<script>
    import {name,email,phone} from './des';

    export default {
        mounted() {
            this.$store.dispatch('incNum');
            console.log('Name: '+name);
            console.log('Email: '+email);
            console.log('Phone: '+phone);
        },
        computed :{
           //
        }
    }
</script>


