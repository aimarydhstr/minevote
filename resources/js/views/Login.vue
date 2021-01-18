<template>
	
<div class="container mt-5">
	<div class="row justify-content-center">
		<div class="col-md-7 bg-white shadow-sm border p-4 rounded-lg">
			<h3>Login Page</h3>
			<p class="pb-3 border-bottom">Isi seluruh form dibawah ini untuk login ke halaman admin atau user</p>
			<form @submit.prevent="onLogin" method="post" action="">
				
				<div class="form-group">
					<label>Email</label>
					<input type="email" name="email" class="form-control" v-model="user.email">
				</div>
				<div class="form-group">
					<label>Password</label>
					<input type="password" name="password" class="form-control" v-model="user.password">
				</div>

				<button type="submit" class="btn btn-primary shadow-sm">Submit</button>

			</form>

		</div>
	</div>
</div>

</template>

<script>
	
export default {

	data() {
		return {
			user : {
				email: '',
				password: ''
			}
		}
	},
	methods: {
		onLogin() {
			const data = {
				email : this.user.email,
				password : this.user.password
			}
			axios.post('/api/login/store', data)
			.then(response => {
				this.user = response.data;
				this.$router.push({ name: 'home' });
				console.log(response);
			});
		}
	}

}

</script>