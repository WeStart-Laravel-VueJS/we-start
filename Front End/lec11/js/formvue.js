const { createApp } = Vue;

const app = createApp({
    data() {
        return {
            fname: 'Mohammed',
            lname: 'Name',
            email: '',
            emailErr: false,
            education: '',
            other: '',
            bio: '',
            bioLen: ''
        }
    },
    // methods: {
    //     fullName() {
    //         console.log('dddddd');
    //         return this.fname + ' ' + this.lname
    //     }
    // },

    computed: {
        fullName() {
            console.log('aaaaa');
            return this.fname + ' ' + this.lname
        }
    },
    watch: {
        email: function() {
            if(this.email.length > 0) {
                var validRegex = /^[a-zA-Z0-9.!#$%&'*+/=?^_`{|}~-]+@[a-zA-Z0-9-]+(?:\.[a-zA-Z0-9-]+)*$/;
        
                if (this.email.match(validRegex)) {
                    this.emailErr = false
                }else {
                    this.emailErr = true
                }
            }
        },
        education: function() {
            this.bio = this.education + ' in : ';
        },
        bio: function() {
            this.bio = this.bio.replace('  ', ' ')

            let len = this.bio.split(' ').length
            if(len >= 5) {
                this.bio = this.bio.split(' ').slice(0, 5).join(' ');
                this.bioLen = this.bio.length;
            }else {
                this.bioLen = '';
            }
        }
    },
    mounted: function() {
        console.log('Run');
    }
})

app.mount('.content')