<template>
	<div>
	  <span class="like-btn"
	  	@click="likeRecipe"
	  	:class="{'like-active' : this.attached > 0 || this.like, 'not-like-active' : this.detached > 0}"
	  >
	  </span>
	  <p>{{ cantidadLikes }} les gusta esto.</p>
	</div>
</template>

<script>
	export default {
		props: ['recipeId', 'like', 'likes'],
		data() {
			return {
				attached: '',
				detached: '',
				totalLikes: this.likes,
			}
		},
		methods: {
			likeRecipe() {
				axios.post('/recipes/' + this.recipeId)
					.then(response => {
						this.attached = response.data.attached.length;
						this.detached = response.data.detached.length;

						if (response.data.attached.length > 0) {
							this.totalLikes++;
						} else {
							this.totalLikes--;
						}
					})
					.catch(error => {
						if (error.response.status === 401) {
							window.location = '/register';
						}
					});
			}
		},

		computed: {
			cantidadLikes() {
				return this.totalLikes;
			},
		},
	}
</script>