const tabs = document.querySelectorAll("[data-concept]");
const panels = document.querySelectorAll("[data-concept-panel]");

tabs.forEach((tab) => {
  tab.addEventListener("click", () => {
    const concept = tab.dataset.concept;

    tabs.forEach((item) => {
      item.classList.toggle("is-active", item === tab);
    });

    panels.forEach((panel) => {
      panel.classList.toggle("is-visible", panel.dataset.conceptPanel === concept);
    });
  });
});
