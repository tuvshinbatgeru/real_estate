<template>
    <table class="table">
      <thead>
        <tr>
          <th scope="col"></th>
          <th scope="col">Төгрөг</th>
        </tr>
      </thead>
      <tbody>
        <tr>
          <th scope="row">Жил</th>
          <td>
            <select class="form-control" id="exampleFormControlSelect1" @change="onChange($event)">
              <option>15</option>
              <option>20</option>
              <option>25</option>
            </select>
          </td>
        </tr>
        <tr>
          <th scope="row">Үндсэн үнэ</th>
          <td>{{ currency(amount) }}</td>
        </tr>
        <tr>
          <th scope="row">Урьдчилгаа</th>
          <td>{{ currency(amount * 0.15, 2) }}</td>
        </tr>
        <tr>
          <th scope="row">Зээл авах дүн</th>
          <td>{{ currency(amount * 0.85, 2) }}</td>
        </tr>
        <tr>
          <th scope="row">Жилийн хүү</th>
          <td>10%</td>
        </tr>
        <tr>
          <th scope="row">Зээл буцаах дүн</th>
          <td>{{ currency((amount * 0.85) * (year * 0.1), 2) }}</td>
        </tr>
        <tr>
          <th scope="row">Сар бүр төлөх дүн</th>
          <td><p class="font-weight-bold">{{ currency(((amount * 0.85) * (year * 0.1)) / year / 12) }}</p></td>
        </tr>
      </tbody>
    </table>
</template>

<script>
    export default {
        props: ['amount'],
        data() {
          return {
            year: 15,
          }
        },
        methods: {
            onChange: function(event) {
              this.year = event.target.value
            },
            currency: function(amount) {
              return (parseFloat(amount)).toFixed(2).replace(/\d(?=(\d{3})+\.)/g, '$&,')
            }
        },
        mounted() {
            console.log(this.amount)
            console.log('Component ready.')
        }
    }
</script>



