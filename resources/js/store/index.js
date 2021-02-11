export default {
    state: {
        count: 0,
        name: 'Erp project',
        number: 0,
    },
    getters:{
        getNumber(){
            return this.number;
        }
    },
    mutations: {
        increment (state) {
            state.count++
        },
        increaseNumber (state) {
            state.number = number++;
        },

    },
    actions:{
      actionName(){
          return 'from action and name is   actionName'
      },
      incNum(context){
          context.commit('increaseNumber',context.data)
      }
    },



}