
import moment from 'moment'
import Vuetable from 'vuetable-2/src/components/Vuetable'
import VuetablePagination from 'vuetable-2/src/components/VuetablePagination'
import VuetablePaginationInfo from 'vuetable-2/src/components/VuetablePaginationInfo'

import VueEvents from 'vue-events'
Vue.use(VueEvents)

export default {

	mixins: {
		components: {
    		Vuetable,
    		VuetablePagination,
    		VuetablePaginationInfo,
  		},
  	 	data () {
    		return {
		      css: {
		        table: {
		          tableClass: 'table table-striped table-hover',
		          ascendingIcon: 'glyphicon glyphicon-chevron-up',
		          descendingIcon: 'glyphicon glyphicon-chevron-down'
		        },
		        pagination: {
		          wrapperClass: 'pagination',
		          activeClass: 'active',
		          disabledClass: 'disabled',
		          pageClass: 'page',
		          linkClass: 'link',
		          icons: {
		            first: '',
		            prev: '',
		            next: '',
		            last: '',
		          },
		        },
		        icons: {
		          first: 'glyphicon glyphicon-step-backward',
		          prev: 'glyphicon glyphicon-chevron-left',
		          next: 'glyphicon glyphicon-chevron-right',
		          last: 'glyphicon glyphicon-step-forward',
		        },
		      },
		      
		      moreParams: {}
    		}
    	},
    	  methods: {

		    onPaginationData (paginationData) {
		      this.$refs.pagination.setPaginationData(paginationData)
		      this.$refs.paginationInfo.setPaginationData(paginationData)
		    },
		    onChangePage (page) {
		      this.$refs.vuetable.changePage(page)
		    }
		}
	}

}


