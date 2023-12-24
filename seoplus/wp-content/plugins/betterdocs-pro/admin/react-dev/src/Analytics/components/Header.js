import React from "react";
import { __ } from "@wordpress/i18n";
import { ReactComponent as BTDLogo } from "../images/BetterDocs Icons.svg";

const Header = () => {
  return (
    <div className="betterdocs-analytics-header">
      <div className="betterdocs-header-left">
        <div className="betterdocs-admin-logo-inline">
          <BTDLogo />
        </div>
        <h2 className="title">
          {__("BetterDocs Analytics", "betterdocs-pro")}
        </h2>
      </div>
      <div className="betterdocs-header-right">
        <span>
          {__("Version: ", "betterdocs-pro")}
          <strong>2.0.9</strong>
        </span>
        <span>
          {__("Pro Version: ", "betterdocs-pro")}
          <strong>2.0.9</strong>
        </span>
      </div>
    </div>
  );
};

export default Header;
