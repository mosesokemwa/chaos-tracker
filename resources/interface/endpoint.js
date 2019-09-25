const HOST = process.env.REACT_APP_API_URL;
// const VERSION = 'v1';

export default {
    API_CLOCK_TIMER: [HOST, "timer"].join("/"),
    API_TASK_START: [HOST, "start"].join("/"),
    API_TASK_STOP: [HOST, "stop"].join("/"),
    API_TASK_REPORT: [HOST, "report"].join("/"),
    API_PUBLIC: [HOST, "home"].join("/")
};