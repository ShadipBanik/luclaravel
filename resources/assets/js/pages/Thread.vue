
<script>
    import Replies from '../components/Replies.vue';
    import SubscribeButton from '../components/SubscribeButton.vue';
    export default {
        props: ['thread'],
        components: {Replies, SubscribeButton},
        data() {
            return {
                repliesCount: this.thread.replies_count,
                editing:false,
                form: {
                    title:this.thread.title,
                    body:this.thread.body
                }
            };
        },

        methods: {
            update(){
                axios.patch('/threads/'+this.thread.channel.slug+'/'+this.thread.slug, {
                   title:this.form.title,
                    body:this.form.body
                }).then(()=>{
                    this.editing=false;
                    flash("Your thread has been updated");
                })
            },

            resetForm () {
                this.form = {
                    title: this.thread.title,
                    body: this.thread.body
                };
                this.editing = false;
            }
        }
    }
</script>