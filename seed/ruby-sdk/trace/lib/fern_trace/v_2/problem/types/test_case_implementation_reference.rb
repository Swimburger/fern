# frozen_string_literal: true

require "json"
require_relative "test_case_implementation"

module SeedTraceClient
  module V2
    class Problem
      class TestCaseImplementationReference
        # @return [Object]
        attr_reader :member
        # @return [String]
        attr_reader :discriminant

        private_class_method :new
        alias kind_of? is_a?

        # @param member [Object]
        # @param discriminant [String]
        # @return [SeedTraceClient::V2::Problem::TestCaseImplementationReference]
        def initialize(member:, discriminant:)
          @member = member
          @discriminant = discriminant
        end

        # Deserialize a JSON object to an instance of TestCaseImplementationReference
        #
        # @param json_object [String]
        # @return [SeedTraceClient::V2::Problem::TestCaseImplementationReference]
        def self.from_json(json_object:)
          struct = JSON.parse(json_object, object_class: OpenStruct)
          member = case struct.type
                   when "templateId"
                     json_object.value
                   when "implementation"
                     SeedTraceClient::V2::Problem::TestCaseImplementation.from_json(json_object: json_object)
                   else
                     json_object
                   end
          new(member: member, discriminant: struct.type)
        end

        # For Union Types, to_json functionality is delegated to the wrapped member.
        #
        # @return [String]
        def to_json(*_args)
          case @discriminant
          when "templateId"
            { "type": @discriminant, "value": @member }.to_json
          when "implementation"
            { **@member.to_json, type: @discriminant }.to_json
          else
            { "type": @discriminant, value: @member }.to_json
          end
          @member.to_json
        end

        # Leveraged for Union-type generation, validate_raw attempts to parse the given
        #  hash and check each fields type against the current object's property
        #  definitions.
        #
        # @param obj [Object]
        # @return [Void]
        def self.validate_raw(obj:)
          case obj.type
          when "templateId"
            obj.is_a?(String) != false || raise("Passed value for field obj is not the expected type, validation failed.")
          when "implementation"
            SeedTraceClient::V2::Problem::TestCaseImplementation.validate_raw(obj: obj)
          else
            raise("Passed value matched no type within the union, validation failed.")
          end
        end

        # For Union Types, is_a? functionality is delegated to the wrapped member.
        #
        # @param obj [Object]
        # @return [Boolean]
        def is_a?(obj)
          @member.is_a?(obj)
        end

        # @param member [String]
        # @return [SeedTraceClient::V2::Problem::TestCaseImplementationReference]
        def self.template_id(member:)
          new(member: member, discriminant: "templateId")
        end

        # @param member [SeedTraceClient::V2::Problem::TestCaseImplementation]
        # @return [SeedTraceClient::V2::Problem::TestCaseImplementationReference]
        def self.implementation(member:)
          new(member: member, discriminant: "implementation")
        end
      end
    end
  end
end
