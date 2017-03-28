require('./bootstrap');


const app = new Vue({
    el: '#app',
    
    created() {
        this.getSongLyrics();
    },

    data: {
        name: '99 Bottles on the Wall',
        numberOfVerses: 99,
        lyrics: '',
        error: ''
    },

    methods: {
        getSongLyrics() {
            axios.get('/api/lyrics/99bottles?verses='+this.numberOfVerses).then(response => {
                this.lyrics = response.data.lyrics.replace(/\n/g, "<br />");
                this.error = '';
            }).catch(response => {
                this.error = 'There was a problem retrieving the songs lyrics.';
                this.lyrics = '';
            });
        }
    }
});
