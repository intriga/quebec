<template>
    <div class="card">
            <div class="card-header">
            <h3 class="card-title">Last Posts</h3>

            <div class="card-tools">
                <div class="input-group input-group-sm" style="width: 150px;">
                    <a href="/post/create" type="button" class="btn btn-primary btn-block">
                        <i class="fas fa-plus"></i>
                        Create
                    </a>
                </div>
            </div>
            </div>
            <!-- /.card-header -->
            <div class="card-body table-responsive p-0">
            <table class="table table-hover text-nowrap">
                <thead>
                    <tr>
                        <th>ID</th>
                        <th>Title</th>
                        <th>Date</th>
                        <th>Options</th>
                    </tr>
                </thead>
                <tbody>
                    <tr v-for="value in posts" :key="value">
                        <td>{{ value.id }}</td>
                        <td>{{ value.title }}</td>
                        <td>{{ format_date(value.created_at) }}</td>
                        <td>
                            <button type="button" class="btn btn-success">
                                <i class="fas fa-eye"></i>
                            </button>
                            <button type="button" class="btn btn-warning">
                                <i class="fas fa-edit"></i>
                            </button>
                            <button type="button" class="btn btn-danger">
                                <i class="fas fa-eraser"></i>
                            </button>
                        </td>
                    </tr>                
                </tbody>
            </table>
            </div>
            <!-- /.card-body -->
        </div>
</template>

<script>

    import axios from 'axios';
    import moment from 'moment';

    export default {

        data() {
            return {
                posts: []
            }
        },

        mounted() {
            this.getPosts();
        },

        methods: {
            getPosts() {
                axios.get('/api/posts').then(res => {
                    this.posts = res.data;
                    //console.log(this.posts);
                });
            },

            format_date(value) {
                if (value) {
                    return moment(String(value)).format('DD/MM/YYYY');
                }
            }

        }
    }
</script>
