using System.Threading.Tasks;
using FluentAssertions.Json;
using Newtonsoft.Json.Linq;
using NUnit.Framework;
using SeedLiteral;
using SeedLiteral.Core;

#nullable enable

namespace SeedLiteral.Test.Unit.MockServer;

[TestFixture]
public class SendTest : BaseMockServerTest
{
    [Test]
    public async Task MockServerTest_1()
    {
        const string requestJson = """
            {
              "prompt": "You are a helpful assistant",
              "stream": false,
              "context": "You're super wise",
              "query": "What is the weather today"
            }
            """;

        const string mockResponse = """
            {
              "message": "The weather is sunny",
              "status": 200,
              "success": true
            }
            """;

        Server
            .Given(
                WireMock
                    .RequestBuilders.Request.Create()
                    .WithPath("/reference")
                    .UsingPost()
                    .WithBodyAsJson(requestJson)
            )
            .RespondWith(
                WireMock
                    .ResponseBuilders.Response.Create()
                    .WithStatusCode(200)
                    .WithBody(mockResponse)
            );

        var response = await Client.Reference.SendAsync(
            new SendRequest
            {
                Prompt = "You are a helpful assistant",
                Stream = false,
                Context = "You're super wise",
                Query = "What is the weather today",
            },
            RequestOptions
        );
        JToken
            .Parse(mockResponse)
            .Should()
            .BeEquivalentTo(JToken.Parse(JsonUtils.Serialize(response)));
    }

    [Test]
    public async Task MockServerTest_2()
    {
        const string requestJson = """
            {
              "prompt": "You are a helpful assistant",
              "stream": false,
              "context": "You're super wise",
              "query": "What is the weather today"
            }
            """;

        const string mockResponse = """
            {
              "message": "The weather is sunny",
              "status": 200,
              "success": true
            }
            """;

        Server
            .Given(
                WireMock
                    .RequestBuilders.Request.Create()
                    .WithPath("/reference")
                    .UsingPost()
                    .WithBodyAsJson(requestJson)
            )
            .RespondWith(
                WireMock
                    .ResponseBuilders.Response.Create()
                    .WithStatusCode(200)
                    .WithBody(mockResponse)
            );

        var response = await Client.Reference.SendAsync(
            new SendRequest
            {
                Prompt = "You are a helpful assistant",
                Stream = false,
                Context = "You're super wise",
                Query = "What is the weather today",
            },
            RequestOptions
        );
        JToken
            .Parse(mockResponse)
            .Should()
            .BeEquivalentTo(JToken.Parse(JsonUtils.Serialize(response)));
    }
}
