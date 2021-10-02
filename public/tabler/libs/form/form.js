
document.getElementById('ajax_form').addEventListener('submit', function (e) {
  e.preventDefault();


  const form = e.target
  const data = serialize(form)
  const card = form.parentElement.parentElement


  card.classList.toggle("whirl")
  card.classList.toggle("traditional")

  let axiosConfig = {
    headers: {
      'X-Requested-With': 'XMLHttpRequest'
    },
  }

  let formUrl = form.action + '?_axios=' + Math.random()

  axios.post(formUrl, data, axiosConfig)
    .then(res => {

      Swal.fire({
        title: 'Success',
        text: res.data.message ?? 'Success',
        icon: 'success',
        showCancelButton: false,
        confirmButtonText: 'Ok.',
        allowOutsideClick: false

      }).then((result) => {

        if (result.isConfirmed) {

          if ("intended" in res.data) {
            window.location = res.data.intended;
          }

        }
      })
    })
    .catch(e => {

      const res = e.response

      let message = 'Something went wrong';
      let title = 'Ooops';

      switch (res.status) {
        case 422: // laravel form request error
          let firstErrorKey = Object.keys(res.data.errors)[0];
          title = res.data.message
          message = res.data.errors[firstErrorKey][0]
          break
        default:
          break

      }

      Swal.fire({
        icon: 'error',
        title: title,
        text: message,
      })

    }).finally(() => {
      card.classList.toggle("whirl")
      card.classList.toggle("traditional")
    });

})