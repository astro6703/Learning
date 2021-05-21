using Microsoft.AspNetCore.Mvc;
using PracticeTestApp.Models;
using PracticeTestApp.ViewModels.Home;

namespace PracticeTestApp.Controllers {
    public class HomeController : Controller {
        public IActionResult Index(int id, string message) {
            return View(new IndexViewModel("Hello, World!"));
        }

        public IActionResult IndexForProduct(Product product) => Ok();

        [HttpPost]
        public IActionResult PostAction() => Ok();

        [HttpPut]
        public IActionResult PutAction() => Ok();

        [HttpDelete]
        public IActionResult DeleteAction() => Ok();
    }
}