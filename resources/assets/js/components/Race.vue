<template>

    <div class='modal-mask'>
      <div class="modal-dialog">

        <!-- Modal content-->
        <div class="modal-content">
            <form >
              <div class="modal-header">
                <button type="button" class="close" data-dismiss="modal" @click="$emit('close')">&times;</button>
                <h4 class="modal-title">{{ rowData.meeting.name + " " + rowData.meeting.type.name + " closing in "  }} <b>{{ rowData.remaining }}</b></h4>
              </div>

              <div class="modal-body ">

                <vuetable ref="vuetable"
                    :api-url="apiUrl"
                    :fields="fields"

                    :css="css.table"
                    :sort-order="sortOrder"
                    :multi-sort="true"
                    :append-params="moreParams"
                    >
                </vuetable>

              </div>

          </form> 
        </div>

      </div>
    </div>

</template>

<script>

    import Listview from '../utilities/Listview.js'

    export default {
        mixins: [Listview.mixins],
        props: {
            rowData: {
                type: Object,
                required: true
            },
            rowIndex: {
                type: Number
            }
        },
        data() {
            return {
                apiUrl: "/api/competitors/paginate?race_id=" + this.rowData.id,
                fields: [
                    {
                      name: '#',
                      callback: 'renderIcon',
                      titleClass: 'icon'
                    },
                    {
                      name: 'position',
                      titleClass: 'text-center position',
                      dataClass: 'text-center'
                    },
                    {
                      name: 'name',
                      title: 'Competitor',
                    }
                ],
                sortOrder: [
                  { field: 'position', sortField: 'position', direction: 'asc'}
                ]
            }
        },
        methods: {

            // -- Render a icon
            renderIcon() {
                var colour = this.getRandomColor()
                return "<i style='color: " + colour + ";' class='glyphicon glyphicon-knight'></i>"
            },
            // -- Generate a random colour
            getRandomColor() {
                var letters = '0123456789ABCDEF';
                var color = '#';
                for (var i = 0; i < 6; i++) {
                    color += letters[Math.floor(Math.random() * 16)];
                }
                return color;
            }
        }

    }
</script>

<style>

    .modal-header {
        background-color: #eeeeee;
        border-radius: 6px 6px 0px 0px;
    }

    .position {
        width: 80px;
    }

    .icon {
        width: 30px;
    }

</style>
