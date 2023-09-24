<script>
    import FileUploader from 'helpers/FileUploader.vue';
    import GalleryUploader from 'helpers/GalleryUploader.vue';
    import Ckeditor from 'vue-ckeditor2';
    import objectToFormData from 'helpers/object-to-formdata';
    import Datepicker from 'vuejs-datepicker';
    import notification from 'services/notification';
    export default {
        components: {
            FileUploader,
            Ckeditor,
            Datepicker,
            GalleryUploader
        },
        data () {
            return {
                typeSlug: '',
                entity: '',
                fields: [],
                form: {},
                lang: "en",
                isSaving: false,
                languages: [],
                config: {
                    toolbar: [
                        [ 'Bold', 'Italic', 'Underline', 'Strike', 'Subscript', 'Superscript', 'FontSize', 'Format', 'Link', 'Maximize','TextColor', 'BGColor',
                            'Image', 'Flash', 'Table', 'HorizontalRule', 'Smiley', 'SpecialChar', 'PageBreak', 'Iframe' ]
                    ],
                    height: 100
                }
            }
        },
        mounted: function () {
            this.typeSlug = this.$route.params.manySlug;
            if (this.$route.params.entityId !== undefined) {
                this.findById();
            } else {
                this.fetchFields();
            }
            this.fetchLanguages();
        },
        methods: {
            fetchFields: function () {
                this.$http.get('/api/get/fields/' + this.$route.params.manyId).then((response) => {
                    this.fields = response.body.fields;
                    this.form = response.body.form;
                });
            },
            storeDatas: function (param, slug) {
                const formData = objectToFormData(param);
                this.isSaving = true;
                if (this.$route.params.entityId !==undefined) {
                    this.$http.post('/api/entities/update/' + this.$route.params.entityId, formData).then((response) => {
                        this.form = response.body.form;
                        this.entity = response.body.entity;
                        this.isSaving = false;
                        notification.show("success", "Entity updated with success!");
                    });
                } else {
                    this.$http.post('/api/pages/entities/' + slug, formData).then((response) => {
                        this.form = response.body.form;
                        this.entity = response.body.entity;
                        this.$route.params.entityId = this.entity.id;
                        this.isSaving = false;
                        notification.show("success", "Entity saved with success!");
                    });
                }
            },
            showSuccess: function (file) {
                let slug = file.slug;
                this.form[slug] = file.files;
                console.log(this.form);
            },
            showSuccessImage: function (file) {
                let slug = file.slug;
                this.form[slug] = file.files[0];
                console.log(this.form[slug]);
            },
            findById: function () {
                this.$http.get('/api/entities/show/' + this.$route.params.entityId + '/' + this.$route.params.manyId).then((response) => {
                    this.fields = response.body.fields;
                    this.form = response.body.form;
                    this.entity = response.body.entity;
                });
            },
            fetchLanguages: function () {
                this.$http.get('/api/languages').then((response) => {
                    this.languages = response.body;
                });
            },
            changeLanguage: function (param) {
                this.lang = param;
            },
            isImage: function (param) {
                let file = param.split(".").pop();
                if (file.match(/^(jpg|jpeg|gif|png|svg)$/)) {
                    return true;
                } else {
                    return false;
                }
            }
        }
    }
</script>

<template src="../templates/many.html">

</template>