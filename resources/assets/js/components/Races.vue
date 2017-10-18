<template>
  <div>

    <div class="nav navbar-default navbar-toolbar">
        <div class="navbar-left navbar-brand">Upcoming Races</div>
        <ul class="nav navbar-nav navbar-right">
            <li><but<router-link to="/" exact style="color: black;" >Reload</router-link></li>
        </ul>
    </div>

    <vuetable ref="vuetable"
        api-url="/api/races/paginate"
        :fields="fields"
        pagination-path=""
        :css="css.table"
        :sort-order="sortOrder"
        :multi-sort="true"
        :append-params="moreParams"
        @vuetable:loaded="onLoaded"
        @vuetable:cell-clicked="onCellClicked"
        @vuetable:pagination-data="onPaginationData"
        >

        <template slot="countdown-action" slot-scope="props">  
            <div v-text="props.rowData.remaining" style="font-weight: bold;"></div>
        </template>

    </vuetable>

    <div class="vuetable-pagination">
      <vuetable-pagination-info ref="paginationInfo"
        info-class="pagination-info"
      ></vuetable-pagination-info>

      <vuetable-pagination ref="pagination"
        :css="css.pagination"
        @vuetable-pagination:change-page="onChangePage"
      ></vuetable-pagination>

    </div>

    <raceCard v-if="showModal" @close="closeModal" v-bind:rowData="currentRow" ></raceCard>

  </div>

</template>

<script>

    import Listview from '../utilities/Listview.js'
    import CountDown from '../utilities/CountDown.js'

    // -- Import Race Card and associate to template
    import RaceCard from './Race.vue'
    Vue.component('raceCard', RaceCard)

    export default {

        mixins: [Listview.mixins],
        data () {
            return {
                counters: [],
                timers: [],
                showModal: false,
                currentRow : {},

                fields: [
                    {
                      name: 'meeting.name',
                      title: 'Meeting',
                    },
                    {
                      name: 'meeting.type.name',
                      title: 'Type'

                    },
                    {
                      name: 'closing_time',
                      sortField: 'closing_time',
                      titleClass: 'closing_time'
                    },
                    {
                      name: '__slot:countdown-action',  
                      title: 'Remaining',
                      titleClass: 'text-right remaining',
                      dataClass: 'text-right'
                    },
                ],
                sortOrder: [
                  { field: 'closing_time', sortField: 'closing_time', direction: 'asc'}
                ]
            }
        },

        methods: {

            onCellClicked (data, field, event) {
                this.currentRow = data
                this.showModal = true
                
            },

            closeModal() {
                this.currentRow = {}
                this.showModal = false

            },

            onLoaded(response) {
                
                // -- Get all the table data and start iterate through the roads
                var races = this.$refs.vuetable.tableData
                var parent = this
                for ( var index in races) {

                    // -- Generate a timer for each row that asyncronously updates its row. Arguably, this could be a single timer
                    // -- that updates all the row. Went with individual to demonstrate OOP through object abstraction.
                    this.timers[index] = new CountDown(races[index], index, this.counters[index])

                    // -- Start timer and pass in close-down callback
                    this.timers[index].start( function() {
                        parent.$refs.vuetable.refresh() 
                    })
                }

            }
        }

    }
</script>

<style>
    .closing_time {
        width:150px;
    }
    .remaining {
        width:100px;
    }
</style>
