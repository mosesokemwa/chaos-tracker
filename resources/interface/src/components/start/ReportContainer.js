import React from "react";
import "../../index.css"
import endpoint from "../../endpoint";
import 'bootstrap/dist/css/bootstrap.css';

class ReportContainer extends React.Component {
    state = {
        users: [],
        error: null
    };

    fetchReportData() {
        fetch(endpoint.API_TASK_REPORT)
            .then(response => response.json())
            .then(data =>
                this.setState({
                    users: data,
                })
            )
            .catch(error => this.setState({ error, }));
    }
    componentDidMount() {
        this.fetchReportData();
        this.timer = setInterval(() => this.fetchReportData(), 5000);
    }
    componentWillUnmount() {
        clearInterval(this.timer);
        this.timer = null;
    }
    render() {
        const { error } = this.state;
        return (
            <React.Fragment>
                <div className="row">
                    <div className="col">
                        <h1>REPORT</h1>
                    </div>
                </div>

                <div className="row">
                    <div className="col">
                        {error ? <p>{error.message}</p> : null}
                        {this.state.users.map(user =>
                                <ReportCard key={user.id} {...user} />
                            )}
                    </div>
                </div>
            </React.Fragment>
        );
    }
}

const ReportCard = (props) => {
    return (
        <div>
            <hr />
            <p><b>Program Time:</b> {props.number.bd}</p>
            <p><b>Event:</b> {props.number.event}</p>
            <p><b>Message:</b> {props.number.message}</p>
            <p><b>Actual Time:</b> {props.number.actualTime}</p>
            <p><b>Display Message:</b> {props.number.message}</p>
            <hr />
        </div>
    )
};


export default ReportContainer;