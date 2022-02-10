import React, { Component } from "react";
import { Result } from "./Result";

const validateURL = /cfx/;

export class App extends Component {
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
      showResult: false
    };
  }

  handleChange(event) {
    this.setState({ url: event.target.value });
  }

  searchInfo() {
    if (validateURL.test(this.state.url)) {

      let urlArray = this.state.url.split('/')
      fetch("https://servers-frontend.fivem.net/api/servers/single/" + urlArray[2])
        .then((res) => res.json())
        .then((data) => {
          if (!data['error']) {
            if (!this.isUrl(data['Data']['connectEndPoints'][0])) {
              let ip = data['Data']['connectEndPoints'][0].split(':')
              fetch("http://ip-api.com/json/" + ip[0])
                .then((res) => res.json())
                .then((data) => {
                  this.setState({
                    address: data['query'],
                    isp: data['isp'],
                    country: data['country']
                  })
                })
                .catch(console.log);
            }
            this.setState({
              server_name: data['Data']['hostname'],
              owner_name: data['Data']['ownerName'],
              owner_url: data['Data']['ownerProfile'],
              total_players: data['Data']['clients'],
            })
          }
        })
        .catch(console.log);
    }
  }

  isUrl(s) {
    var regexp = /(ftp|http|https):\/\/(\w+:{0,1}\w*@)?(\S+)(:[0-9]+)?(\/|\/([\w#!:.?+=&%@!\-\/]))?/
    return regexp.test(s);
  }

  render() {
    return (
      <>
        <div className="lg:grid lg:grid-cols-1 lg:gap-8">
          <div className="mx-auto max-w-md px-4 sm:max-w-2xl sm:px-6 sm:text-center lg:px-0 lg:text-left lg:flex lg:items-center">
            <div className="py-12">
              <h1 className="text-4xl tracking-tight font-extrabold text-white sm:mt-5 sm:text-6xl lg:mt-6 xl:text-6xl">
                <span className="block pb-3 sm:pb-5">Search tool for CFX</span>
              </h1>
              <p className="text-base text-gray-300 sm:text-xl lg:text-lg xl:text-xl">
                Powerful way to search information for cfx servers.
              </p>
              <div className="mt-8 sm:mt-12">
                <div className="sm:flex">
                  <div className="min-w-0 flex-1">
                    <label htmlFor="url" className="sr-only">
                      Email address
                    </label>
                    <input
                      type="text"
                      placeholder="Enter URL"
                      className="block w-full px-4 py-3 rounded-md border-0 text-base text-gray-900 placeholder-gray-500 focus:outline-none focus:ring-2 focus:ring-offset-2 focus:ring-cyan-400 focus:ring-offset-gray-900"
                      onChange={this.handleChange.bind(this)}
                    />
                  </div>
                  <div className="mt-3 sm:mt-0 sm:ml-3">
                    <button
                      className="block w-full py-3 px-4 rounded-md shadow bg-red-400 text-white font-medium hover:from-teal-600 hover:to-cyan-700 focus:outline-none focus:ring-2 focus:ring-offset-2 focus:ring-cyan-400 focus:ring-offset-gray-900"
                      onClick={this.searchInfo.bind(this)}
                    >
                      Search now
                    </button>
                  </div>
                </div>
                <p className="mt-3 text-sm text-gray-300 sm:mt-4">
                  Example: cfx.re/join/******.
                </p>
              </div>
            </div>
          </div>
        </div>

        <Result />
      </>
    );
  }
}