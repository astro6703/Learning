using Microsoft.AspNetCore.Mvc;
using PracticeTestApp.Models;

namespace PracticeTestApp.Controllers {
    [ApiController]
    [Route("api/[controller]")]
    public class DataController : ControllerBase {
        [HttpGet]
        public ActionResult<string[]> Get() {
            var strings = new[] {
                "1", "2", "3", "4", "5"
            };
            return strings;
        }

        [HttpPost]
        public ActionResult<Product[]> Post() {
            var products = new[] {
                new Product { Id = 1, Name = "First", Type = "Utilities" },
                new Product { Id = 2, Name = "Second", Type = "Sports" },
                new Product { Id = 3, Name = "Third", Type = "Other" }
            };
            return products;
        }
    }
}