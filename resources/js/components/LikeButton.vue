<template>
	<div>
	  <span class="like-btn"
	  	@click="likeRecipe"
	  	:class="{'like-active' : this.attached > 0 || this.like, 'not-like-active' : this.detached > 0}"
	  >
	  </span>
	</div>
</template>

<script>
	export default {
		props: ['recipeId', 'like'],
		data() {
			return {
				attached: '',
				detached: '',
			}
		},
		methods: {
			likeRecipe() {
				axios.post('/recipes/' + this.recipeId)
					.then(response => {
						console.log(response.data);
					})
					.catch(error => {
						console.log(error);
					});
			}
		},
	}
</script>