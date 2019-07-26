<template>
    <table class="table">
      <thead>
        <tr>
          <th scope="col"></th>
          <th scope="col"></th>
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
          <th scope="row" style="vertical-align: middle;">Үндсэн үнэ</th>
          <td><input class="form-control" type='number' v-model="amount" @change="onAmountChange($event)" aria-describedby="emailHelp" placeholder="оруулах" /></td>
        </tr>
        <tr>
          <th scope="row" style="vertical-align: middle;">Урьдчилгаа</th>
          <td><input class="form-control" type='number' v-model="preAmount" aria-describedby="emailHelp" placeholder="оруулах" /></td>
        </tr>
        <tr>
          <th scope="row" style="vertical-align: middle;">Жилийн хүү</th>
          <td><input class="form-control" type='number' v-model="yearPercentage" aria-describedby="emailHelp" placeholder="оруулах" /></td>
        </tr>
        <tr>
          <th scope="row">Зээл авах дүн</th>
          <td>{{ currency(amount * 0.85, 2) }}</td>
        </tr>
        <tr>
          <th scope="row">Сар бүр төлөх дүн</th>
          <td><p class="font-weight-bold">{{ currency(((amount * 0.85) * (year * (yearPercentage / 100))) / year / 12) }}</p></td>
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
            yearPercentage: 10,
            tempAmount: 0,
            preAmount: 0
          }
        },
        methods: {
            onChange: function(event) {
              this.year = event.target.value
            },
            onAmountChange: function(event) {
              this.preAmount = parseInt(this.amount * 0.15)
            },
            currency: function(amount) {
              return (parseFloat(amount)).toFixed(2).replace(/\d(?=(\d{3})+\.)/g, '$&,')
            }
        },
        mounted() {
            this.preAmount = parseInt(this.amount * 0.15)
            //console.log(this.amount)
            //this.tempAmount = this.amount
            //console.log('Component ready.')
        }
    }
</script>



