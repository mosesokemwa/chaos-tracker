import { START_SERVICES, FAIL_START_SERVICES, PASS_START_SERVICES} from "./types";
import endpoints from "../../../endpoint";
import xhr from "../../../utils/xhr";

const startGetServices = () => ({
    type: START_SERVICES
});


const failGetServices = (error) => ({
    type: FAIL_START_SERVICES,
    err: error
});

const passGetServices = (data, filters={}) => ({
    type: PASS_START_SERVICES,
    data: data,
    filters
});

export default function get(filters) {
    return dispatch => {
        dispatch(startGetServices());
        xhr.get(endpoints.API_TASK_START, {params: filters})
            .then(({data}) => dispatch(passGetServices(data.data, filters)))
            .catch(({message}) => dispatch(failGetServices(message)))
    }
}
//
// export function post(data, ) {
//     return (dispatch, getState) => {
//         dispatch(fireGetAttendances());
//         xhr.post(endpoints.API_ATTENDANCE_RECORD, data)
//             .then(()=>dispatch(get({...getState().attendances.filters, poll: true})))
//     }
// }