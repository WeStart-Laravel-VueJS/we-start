let url = 'https://api.github.com/users/';


const { createApp } = Vue;

createApp({
    data() {
        return {
            username: '',
            name: '',
            image: '',
            repos: []
        }
    },
    methods: {
        searchUser: function() {
            axios.get(url+this.username)
            .then(res => {
                this.name = res.data.name
                this.image = res.data.avatar_url

                axios.get(res.data.repos_url)
                .then(res => {
                    this.repos = res.data
                })  

            })
        }
    }
}).mount('.wrapper')