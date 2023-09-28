let tabs = document.getElementById("myTabContent");

if (tabs !== null) {
  const paginationNumbers1 = document.getElementById("pagination-numbers-1");
  const paginatedList1 = document.getElementById("paginated-list-1");
  const listItem1 = paginatedList1.getElementsByClassName("table-body-tr-1");
  var listItems1 = Array.from(listItem1);
  console.log(listItems1);
  const nextButton1 = document.getElementById("next-button-1");
  const prevButton1 = document.getElementById("prev-button-1");

  const paginationLimit1 = 4;
  const pageCount1 = Math.ceil(listItems1.length / paginationLimit1);
  let currentPage1 = 1;

  const disableButton1 = (button) => {
    button.classList.add("disabled");
    button.setAttribute("disabled", true);
  };

  const enableButton1 = (button) => {
    button.classList.remove("disabled");
    button.removeAttribute("disabled");
  };

  const handlePageButtonsStatus1 = () => {
    if (currentPage1 === 1) {
      disableButton1(prevButton1);
    } else {
      enableButton1(prevButton1);
    }

    if (pageCount1 === currentPage1) {
      disableButton1(nextButton1);
    } else {
      enableButton1(nextButton1);
    }
  };

  const handleActivePageNumber1 = () => {
    document.querySelectorAll(".pagination-number-1").forEach((button) => {
      button.classList.remove("active");
      const pageIndex1 = Number(button.getAttribute("page-index-1"));
      if (pageIndex1 == currentPage1) {
        button.classList.add("active");
      }
    });
  };

  const appendPageNumber1 = (index) => {
    const pageNumber1 = document.createElement("button");
    pageNumber1.className = "pagination-number-1";
    pageNumber1.innerHTML = index;
    pageNumber1.setAttribute("page-index-1", index);
    pageNumber1.setAttribute("aria-label", "Page " + index);

    paginationNumbers1.appendChild(pageNumber1);
  };

  const getPaginationNumbers1 = () => {
    for (let i = 1; i <= pageCount1; i++) {
      appendPageNumber1(i);
    }
  };

  const setCurrentPage1 = (pageNum1) => {
    currentPage1 = pageNum1;
    handleActivePageNumber1();
    handlePageButtonsStatus1();

    const prevRange1 = (pageNum1 - 1) * paginationLimit1;
    const currRange1 = pageNum1 * paginationLimit1;

    listItems1.forEach((item, index) => {
      item.classList.add("hidden");
      if (index >= prevRange1 && index < currRange1) {
        item.classList.remove("hidden");
      }
    });
  };

  window.addEventListener("load", () => {
    getPaginationNumbers1();
    setCurrentPage1(1);

    prevButton1.addEventListener("click", () => {
      setCurrentPage1(currentPage1 - 1);
    });

    nextButton1.addEventListener("click", () => {
      setCurrentPage1(currentPage1 + 1);
    });

    document.querySelectorAll(".pagination-number-1").forEach((button) => {
      const pageIndex1 = Number(button.getAttribute("page-index-1"));

      if (pageIndex1) {
        button.addEventListener("click", () => {
          setCurrentPage1(pageIndex1);
        });
      }
    });
  });

  const paginationNumbers2 = document.getElementById("pagination-numbers-2");
  const paginatedList2 = document.getElementById("paginated-list-2");
  const listItem2 = paginatedList2.getElementsByClassName("table-body-tr-2");
  var listItems2 = Array.from(listItem2);
  console.log(listItems2);
  const nextButton2 = document.getElementById("next-button-2");
  const prevButton2 = document.getElementById("prev-button-2");

  const paginationLimit2 = 4;
  const pageCount2 = Math.ceil(listItems2.length / paginationLimit2);
  let currentPage2 = 1;

  const disableButton2 = (button) => {
    button.classList.add("disabled");
    button.setAttribute("disabled", true);
  };

  const enableButton2 = (button) => {
    button.classList.remove("disabled");
    button.removeAttribute("disabled");
  };

  const handlePageButtonsStatus2 = () => {
    if (currentPage2 === 1) {
      disableButton2(prevButton2);
    } else {
      enableButton2(prevButton2);
    }

    if (pageCount2 === currentPage2) {
      disableButton2(nextButton2);
    } else {
      enableButton2(nextButton2);
    }
  };

  const handleActivePageNumber2 = () => {
    document.querySelectorAll(".pagination-number-2").forEach((button) => {
      button.classList.remove("active");
      const pageIndex2 = Number(button.getAttribute("page-index-2"));
      if (pageIndex2 == currentPage2) {
        button.classList.add("active");
      }
    });
  };

  const appendPageNumber2 = (index) => {
    const pageNumber2 = document.createElement("button");
    pageNumber2.className = "pagination-number-2";
    pageNumber2.innerHTML = index;
    pageNumber2.setAttribute("page-index-2", index);
    pageNumber2.setAttribute("aria-label", "Page " + index);

    paginationNumbers2.appendChild(pageNumber2);
  };

  const getPaginationNumbers2 = () => {
    for (let i = 1; i <= pageCount2; i++) {
      appendPageNumber2(i);
    }
  };

  const setCurrentPage2 = (pageNum2) => {
    currentPage2 = pageNum2;
    handleActivePageNumber2();
    handlePageButtonsStatus2();

    const prevRange2 = (pageNum2 - 1) * paginationLimit2;
    const currRange2 = pageNum2 * paginationLimit2;

    listItems2.forEach((item, index) => {
      item.classList.add("hidden");
      if (index >= prevRange2 && index < currRange2) {
        item.classList.remove("hidden");
      }
    });
  };

  window.addEventListener("load", () => {
    getPaginationNumbers2();
    setCurrentPage2(1);

    prevButton2.addEventListener("click", () => {
      setCurrentPage2(currentPage2 - 1);
    });

    nextButton1.addEventListener("click", () => {
      setCurrentPage2(currentPage2 + 1);
    });

    document.querySelectorAll(".pagination-number-2").forEach((button) => {
      const pageIndex2 = Number(button.getAttribute("page-index-2"));

      if (pageIndex2) {
        button.addEventListener("click", () => {
          setCurrentPage2(pageIndex2);
        });
      }
    });
  });

  const paginationNumbers = document.getElementById("pagination-numbers");
  const paginatedList = document.getElementById("paginated-list");
  const listItem = paginatedList.getElementsByClassName("table-body-tr");
  var listItems = Array.from(listItem);
  console.log(listItems);
  const nextButton = document.getElementById("next-button");
  const prevButton = document.getElementById("prev-button");

  const paginationLimit = 4;
  const pageCount = Math.ceil(listItems.length / paginationLimit);
  let currentPage = 1;

  const disableButton = (button) => {
    button.classList.add("disabled");
    button.setAttribute("disabled", true);
  };

  const enableButton = (button) => {
    button.classList.remove("disabled");
    button.removeAttribute("disabled");
  };

  const handlePageButtonsStatus = () => {
    if (currentPage === 1) {
      disableButton(prevButton);
    } else {
      enableButton(prevButton);
    }

    if (pageCount === currentPage) {
      disableButton(nextButton);
    } else {
      enableButton(nextButton);
    }
  };

  const handleActivePageNumber = () => {
    document.querySelectorAll(".pagination-number").forEach((button) => {
      button.classList.remove("active");
      const pageIndex = Number(button.getAttribute("page-index"));
      if (pageIndex == currentPage) {
        button.classList.add("active");
      }
    });
  };

  const appendPageNumber = (index) => {
    const pageNumber = document.createElement("button");
    pageNumber.className = "pagination-number";
    pageNumber.innerHTML = index;
    pageNumber.setAttribute("page-index", index);
    pageNumber.setAttribute("aria-label", "Page " + index);

    paginationNumbers.appendChild(pageNumber);
  };

  const getPaginationNumbers = () => {
    for (let i = 1; i <= pageCount; i++) {
      appendPageNumber(i);
    }
  };

  const setCurrentPage = (pageNum) => {
    currentPage = pageNum;
    handleActivePageNumber();
    handlePageButtonsStatus();

    const prevRange = (pageNum - 1) * paginationLimit;
    const currRange = pageNum * paginationLimit;

    listItems.forEach((item, index) => {
      item.classList.add("hidden");
      if (index >= prevRange && index < currRange) {
        item.classList.remove("hidden");
      }
    });
  };

  window.addEventListener("load", () => {
    getPaginationNumbers();
    setCurrentPage(1);

    prevButton.addEventListener("click", () => {
      setCurrentPage(currentPage - 1);
    });

    nextButton.addEventListener("click", () => {
      setCurrentPage(currentPage + 1);
    });

    document.querySelectorAll(".pagination-number").forEach((button) => {
      const pageIndex = Number(button.getAttribute("page-index"));

      if (pageIndex) {
        button.addEventListener("click", () => {
          setCurrentPage(pageIndex);
        });
      }
    });
  });
} else {
  const paginationNumbers = document.getElementById("pagination-numbers");
  const paginatedList = document.getElementById("paginated-list");
  const listItem = paginatedList.getElementsByClassName("table-body-tr");
  var listItems = Array.from(listItem);
  console.log(listItems);
  const nextButton = document.getElementById("next-button");
  const prevButton = document.getElementById("prev-button");

  const paginationLimit = 4;
  const pageCount = Math.ceil(listItems.length / paginationLimit);
  let currentPage = 1;

  const disableButton = (button) => {
    button.classList.add("disabled");
    button.setAttribute("disabled", true);
  };

  const enableButton = (button) => {
    button.classList.remove("disabled");
    button.removeAttribute("disabled");
  };

  const handlePageButtonsStatus = () => {
    if (currentPage === 1) {
      disableButton(prevButton);
    } else {
      enableButton(prevButton);
    }

    if (pageCount === currentPage) {
      disableButton(nextButton);
    } else {
      enableButton(nextButton);
    }
  };

  const handleActivePageNumber = () => {
    document.querySelectorAll(".pagination-number").forEach((button) => {
      button.classList.remove("active");
      const pageIndex = Number(button.getAttribute("page-index"));
      if (pageIndex == currentPage) {
        button.classList.add("active");
      }
    });
  };

  const appendPageNumber = (index) => {
    const pageNumber = document.createElement("button");
    pageNumber.className = "pagination-number";
    pageNumber.innerHTML = index;
    pageNumber.setAttribute("page-index", index);
    pageNumber.setAttribute("aria-label", "Page " + index);

    paginationNumbers.appendChild(pageNumber);
  };

  const getPaginationNumbers = () => {
    for (let i = 1; i <= pageCount; i++) {
      appendPageNumber(i);
    }
  };

  const setCurrentPage = (pageNum) => {
    currentPage = pageNum;
    handleActivePageNumber();
    handlePageButtonsStatus();

    const prevRange = (pageNum - 1) * paginationLimit;
    const currRange = pageNum * paginationLimit;

    listItems.forEach((item, index) => {
      item.classList.add("hidden");
      if (index >= prevRange && index < currRange) {
        item.classList.remove("hidden");
      }
    });
  };

  window.addEventListener("load", () => {
    getPaginationNumbers();
    setCurrentPage(1);

    prevButton.addEventListener("click", () => {
      setCurrentPage(currentPage - 1);
    });

    nextButton.addEventListener("click", () => {
      setCurrentPage(currentPage + 1);
    });

    document.querySelectorAll(".pagination-number").forEach((button) => {
      const pageIndex = Number(button.getAttribute("page-index"));

      if (pageIndex) {
        button.addEventListener("click", () => {
          setCurrentPage(pageIndex);
        });
      }
    });
  });
}
