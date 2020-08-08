<template>
	<div>
	  <span class="like-btn" @click="likeRecipe"></span>
	</div>
</template>

<script>
	export default {
		props: ['recipeId'],
		methods: {
			likeRecipe() {
				axios.post('/recipes/' + this.recipeId)
				.then(response => {
					console.log(response);
				})
				.catch(error => {
					console.log(error);
				});
			}
		}
	}
</script>