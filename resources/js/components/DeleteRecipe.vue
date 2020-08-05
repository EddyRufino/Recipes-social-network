<template>
	<div class="">
		<a class="dropdown-item"
			@click="deleteRecipe"
		>
			Delete
		</a>
	</div>
</template>

<script>
	export default {
		props: ['recipeId'],

		methods: {
			deleteRecipe() {
				this.$swal({
					  title: 'Are you sure?',
					  text: "You won't be able to revert this!",
					  icon: 'warning',
					  showCancelButton: true,
					  confirmButtonColor: '#3085d6',
					  cancelButtonColor: '#d33',
					  confirmButtonText: 'Yes, delete it!'
					}).then((result) => {
					  if (result.value) {

					  	const params = {
					  		id: this.recipeId
					  	}

					  	axios.post(`/recipes/${this.recipeId}`,{
					  		params,
					  		_method: 'delete'
					  	})
					  	.then(response => {
					    this.$swal({
					    	title: 'Deleted!',
					      	text: 'Your file has been deleted.',
					      	icon: 'success'
					    });

					    // Agrega .parentNode segun cuantos padres tenga tu delete
					  	this.$el.parentNode.parentNode.parentNode.parentNode.parentNode.removeChild(this.$el.parentNode.parentNode.parentNode.parentNode);
					  	})
					  	.catch(error => {
					  		console.log(error);	
					  	})


					  }
					})
			}
		}
	}
</script>
