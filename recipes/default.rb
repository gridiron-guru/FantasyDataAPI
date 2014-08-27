#
# Cookbook Name:: fantasy-data-api
# Recipe:: default
#
# Copyright (C) 2014 Robert G. Johnson Jr.
#
# Link: https://github.com/gridiron-guru/FantasyDataAPI for the canonical source repository
# License: http://opensource.org/licenses/Apache-2.0
# Package: FantasyDataAPI
#

include_recipe 'php-webserver'
include_recipe 'web-developer-cookbook'

gem_package 'bootstrap-sass'
