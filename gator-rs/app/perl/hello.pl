#!/usr/bin/perl

use Chatbot::Eliza;

my $chatterbot = new Chatbot::Eliza;

print $chatterbot->transform(@ARGV[0]);;