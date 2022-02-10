import React, { Component } from "react";

export class Result extends Component {

    constructor(props) {
        super(props);
        this.state = {
            url: undefined,
            country: undefined,
            server_name: undefined,
            owner_name: undefined,
            owner_url: undefined,
            address: undefined,
            isp: undefined,
            total_players: undefined,
        };
    }
    render() {
        return (
            <>
                <div className="bg-white shadow overflow-hidden sm:rounded-lg">
                    <div className="grid grid-rows-4 gap-x-4 gap-y-8 p-6">
                        <div>
                            <div className="text-sm font-medium text-gray-500">Address</div>
                            <div className="mt-1 text-sm">
                                <a
                                    target="_blank"
                                    className="text-sky-400"
                                    href="https://ip-api.com/#{this.state.address}"
                                >
                                    {this.state.address}
                                </a>
                            </div>
                        </div>
                        <div>
                            <div className="text-sm font-medium text-gray-500">Hosting</div>
                            <div className="mt-1 text-sm text-gray-900">{this.state.isp}</div>
                        </div>
                        <div>
                            <div className="text-sm font-medium text-gray-500">Location</div>
                            <div className="mt-1 text-sm text-gray-900">
                                {this.state.country}
                            </div>
                        </div>
                        <div>
                            <div className="text-sm font-medium text-gray-500">
                                Server Name
                            </div>
                            <div className="mt-1 text-sm text-gray-900">
                                {this.state.server_name}
                            </div>
                        </div>
                        <div>
                            <div className="text-sm font-medium text-gray-500">
                                Owner Name
                            </div>
                            <div className="mt-1 text-sm text-gray-900">
                                <a
                                    className="text-sky-400"
                                    target="_blank"
                                    href="{this.state.owner_url}"
                                >
                                    {this.state.owner_name}
                                </a>
                            </div>
                        </div>
                        <div>
                            <div className="text-sm font-medium text-gray-500">
                                Total Players
                            </div>
                            <div className="mt-1 text-sm text-gray-900">
                                {this.state.total_players}
                            </div>
                        </div>
                    </div>
                </div>
            </>
        )
    }
}